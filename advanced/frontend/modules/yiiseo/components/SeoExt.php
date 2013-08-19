<?php

class SeoExt extends CApplicationComponent
{
    /* массив, который будет наполнятся тэгами, что бы исключать уже найденые теги в ссылках выше по иерархии */
    public $exist = array();

    public function run($language = null){
        $this->verifyTable();
        /*
         * получаем все возможные сслыки по Иерархии
         * Пример: исходная ссылка "site/product/type/34"
         * Результат:   - site/product/type/34/*
                        - site/product/type/34
                        - site/product/type/*
                        - site/product/type
                        - site/product/*
                        - site/product
                        - site/*
                        - site
                        - /*
                        - /
         */
        $urls = $this->getUrls();


        foreach($urls as $url)
        {
            $crt = new CDbCriteria();
            $crt->condition = "url = :param";
            $crt->params = array(":param"=>$url);
            if($language != null)
                $crt->addCondition("language = '".$language."'",'AND');

            $urlF = YiiseoUrl::model()->find($crt);
            if($urlF !== null){
                $this->seoName($urlF->id);
            }
        }

        $propertyExist = YiiseoProperty::model()->findAll();
        if(count($propertyExist))
        {
            $boolean = false;
            foreach($urls as $url)
            {
                $crt = new CDbCriteria();
                $crt->condition = "url = :param";
                $crt->params = array(":param"=>$url);
                if($language != null)
                    $crt->addCondition("language = '".$language."'",'AND');

                $urlF = YiiseoUrl::model()->find($crt);
                if($urlF !== null)
                    $boolean = $this->seoProperty($urlF->id);

                if($boolean) break;

            }
        }

    }

    /*
    Данная функция находит все MetaName, по ссылке
    $url - ссылка по которой будут искаться теги
    */
    private function seoName($url)
    {
        $content = null;
        $crt = new CDbCriteria();
        $crt->condition = "url = :param AND active = '1'";
        $crt->params = array(":param"=>$url);

        $seoRes = YiiseoMain::model()->findAll($crt);

        if(count($seoRes)){
            foreach($seoRes as $res)
            {
                /* проверяем не находится ли данные мета тег в массиве уже найденых */
                if(!in_array($res->name,$this->exist))
                {
                    /* если не находится, то добавляем в список на исключение для ссылок ниже по иерархии */
                    $this->exist[]=$res->name;
                    $content = $res->content;
                    /* если результат равен "_null" , то данный мета тег не будет выведен на странице */
                    if($content != "_null"){

                        /* проверяем указан ли параметр для текущей ссылки */
                        if($res->param != null)
                        {

                            $param = $this->getSeoparam($res->param);
                            if($param != ""){
                                /*
                                * {param} - место куда будет вставлятся выбраный параметр
                                * если указано место куда нужно вставлять  параметр ({param}), то вставляем его, иначе добавляем в конец
                                */
                                if (strstr($content, "{param}"))
                                {
                                    $content = str_replace ('{param}', $param, $content);
                                }
                                else
                                {
                                    $content .= " ".$param;
                                }
                            }
                        }
                        /* функция вывода Мета тега */
                        $this->printMeta($res->name,$content);
                    }
                }
            }
        }

    }

    /*
    Данная функция находит все MetaProperty, по ссылке
    $url - ссылка по которой будут искаться property
    работает до первого нахождения свойств
    */
    private function seoProperty($url)
    {
        $content = null;
        $crt = new CDbCriteria();
        $crt->condition = "url = :param";
        $crt->params = array(":param"=>$url);

        $seoRes = YiiseoProperty::model()->findAll($crt);

        if(count($seoRes)){
            foreach($seoRes as $res)
            {
                $content = $res->content;
                if($content != "_null"){

                    if($res->param != null)
                    {

                        $param = $this->getSeoparam($res->param);
                        if($param != ""){
                            if (strstr($content, "{param}"))
                            {
                                $content = str_replace ('{param}', $param, $content);
                            }
                            else
                            {
                                $content .= " ".$param;
                            }
                        }
                    }
                    $this->printProperty($res->name,$content);
                }
            }
            return true;
        }
        else
            return false;

    }

    /*
     * функция вывода Мета Тега на страницу
     * @name - название мета-тега
     * @content - значение
     */
    private function printMeta($name,$content)
    {
        $content = strip_tags($content);
        if($name == "keywords")
            $content = str_replace (',', ", ", $content);
        if($name == "title")
            echo "<title>$content</title>\n";
        else{
            echo "<meta name='$name' content='$content' />\n";
        }
    }

    /*
    * функция вывода Мета Property на страницу
    * @name - название мета-property
    * @content - значение
    */
    private function printProperty($name,$content)
    {
        $content = strip_tags($content);
        echo "<meta property='$name' content='$content' />\n";
    }

    /*
    * функция , которая находит все ссылки по иерархии, начиная с той на которой находится пользователь
    */
    private function getUrls()
    {
        $result = null;
        $urls = Yii::app()->request->url;
        $data = explode("/",$urls);
        unset($data[0]);

        while(count($data))
        {
            $_url = "";
            $i = 0;
            foreach($data as $key=>$d)
            {
                $_url .= $i++ ? "/".$d : $d ;
            }

            $result[] = $_url."/*";
            $result[] = $_url;
            unset($data[$key]);

        }
        $result[] = "/*";
        $result[] = "/";

        return $result;
    }

    /*
    * функция возвращающая значение параметра если он указан
    * Существуют два типа параметров прямой (ModelName/attribyte) или по связи (ModelName/relation>>attribyte)
    */
    private function getSeoparam($param)
    {
        $urls = Yii::app()->request->url;
        $data = explode("/",$urls);
        $id = $data[count($data)-1];
        /* если есть символ ">>" значит параметр по связи */
        if(strstr($param, ">>")){
            $data = explode(">>",$param);
            $param = explode("/",$data[0]);
            if(class_exists($param[0],false)){
                $item = new $param[0];
                $item = $item->findByPk($id);

                if(count($item)){
                    return $item[$param[1]][$data[1]];
                }
            }
            else
                return "";
        }
        else{
            $param = explode("/",$param);
            if(class_exists($param[0],false)){
                $item = new $param[0];
                $item = $item->findByPk($id);
                if(count($item)){
                    return $item[$param[1]];
                }
            }
            else
                return "";
        }
    }

    public function verifyTable()
    {
        
        if (!Yii::app()->getDb()->schema->getTable('yiiseo_url')) {
            Yii::app()->getDb()->createCommand()->createTable("yiiseo_url", array(
                'id' => 'pk',
                'url' => 'text',
                'language' => 'string',
            ),'ENGINE=InnoDB');
        }

        if (!Yii::app()->getDb()->schema->getTable('yiiseo_main')) {
            Yii::app()->getDb()->createCommand()->createTable("yiiseo_main", array(
                'id' => 'pk',
                'url' => 'integer',
                'name' => 'string',
                'content' => 'text',
                'param' => 'text',
                'active' => 'boolean',
            ),'ENGINE=InnoDB');
            Yii::app()->getDb()->createCommand()->addForeignKey('url', 'yiiseo_main', 'url','yiiseo_url', 'id', 'CASCADE', 'CASCADE');
        }

        if (!Yii::app()->getDb()->schema->getTable('yiiseo_property')) {
            Yii::app()->getDb()->createCommand()->createTable("yiiseo_property", array(
                'id' => 'pk',
                'url' => 'integer',
                'name' => 'string',
                'content' => 'text',
                'param' => 'text',
            ),'ENGINE=InnoDB');
            Yii::app()->getDb()->createCommand()->addForeignKey('url1', 'yiiseo_property', 'url','yiiseo_url', 'id', 'CASCADE', 'CASCADE');
        }

    }
}
