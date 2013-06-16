<?php

class SeoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout='/layouts/column2';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','addmetaname',"deletemetaname","addmetaproperty","deletemetaproperty",'create','update','admin','delete'),
                'expression'=>'isset(Yii::app()->userseo->name)',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new YiiseoUrl;

        /* declare a basic meta-name {title, description, keywords}*/
		$modelTitle=new YiiseoMain();
        $modelTitle->name = "title";
        $modelKeywords=new YiiseoMain();
        $modelKeywords->name = "keywords";
        $modelDescription=new YiiseoMain();
        $modelDescription->name = "description";


        if(isset($_POST['YiiseoUrl']))
		{
			$model->attributes=$_POST['YiiseoUrl'];
            /* save url */
			if($model->save())
            {
                /* save MetaName */
                if(isset($_POST['YiiseoMain']))
                {
                    $items = $_POST['YiiseoMain'];
                    foreach($items as $name=>$item)
                    {
                        $mod = new YiiseoMain();
                        $mod->name = $name;
                        $mod->url = $model->id;
                        $mod->attributes = $item;
                        $mod->save();
                    }
                }

                /* save MetaProperty */
                if(isset($_POST['YiiseoProperty']))
                {
                    $propertys = $_POST['YiiseoProperty'];
                    foreach($propertys as $property)
                    {
                        $modelP = new YiiseoProperty();
                        $modelP->attributes = $property;
                        $modelP->url = $model->id;
                        $modelP->save();
                    }
                }

                $this->redirect(array("index"));
            }

		}

		$this->render('create',array(
			'model'=>$model,
            'modelTitle'=>$modelTitle,
            "modelKeywords"=>$modelKeywords,
            "modelDescription"=>$modelDescription
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        /* load url */
		$model=$this->loadModel($id);
        /* load a basic meta-name {title, description, keywords}, if data NULL, declare */
        $modelTitle=YiiseoMain::model()->findByAttributes(array("url"=>$model->id,'name'=>"title"));
        if($modelTitle===null)
        {
            $modelTitle=new YiiseoMain();
            $modelTitle->name = "title";
        }
        /* load keywords */
        $modelKeywords=YiiseoMain::model()->findByAttributes(array("url"=>$model->id,'name'=>"keywords"));
        if($modelKeywords===null)
        {
            $modelKeywords=new YiiseoMain();
            $modelKeywords->name = "keywords";
        }

        $modelDescription=YiiseoMain::model()->findByAttributes(array("url"=>$model->id,'name'=>"description"));
        if($modelDescription===null)
        {
            $modelDescription=new YiiseoMain();
            $modelDescription->name = "description";
        }

        /* load else meta-name */
        $crt = new CDbCriteria();
        $crt->condition = "url = :param";
        $crt->params = array(":param"=>$id);
        $crt->addNotInCondition("name",array("title","description","keywords"));
        $modelOther = YiiseoMain::model()->findAll($crt);

        if(isset($_POST['YiiseoUrl']))
        {
            $model->attributes=$_POST['YiiseoUrl'];
            /* update url */
            if($model->save())
            {
                /* save or update MetaName */
                if(isset($_POST['YiiseoMain']))
                {
                    $items = $_POST['YiiseoMain'];
                    foreach($items as $name=>$item)
                    {
                        if(isset($item['id']))
                            $mod = YiiseoMain::model()->findByPk($item['id']);
                        else
                        {
                            $mod = new YiiseoMain();
                            $mod->name = $name;
                            $mod->url = $model->id;
                        }

                        $mod->attributes = $item;
                        $mod->save();
                    }
                }

                /* save or update MetaProperty */
                if(isset($_POST['YiiseoProperty']))
                {
                    $propertys = $_POST['YiiseoProperty'];
                    foreach($propertys as $property)
                    {
                        if(isset($property['id']))
                            $modelP = YiiseoProperty::model()->findByPk($property['id']);
                        else{
                            $modelP = new YiiseoProperty();
                            $modelP->url = $model->id;
                        }
                        $modelP->attributes = $property;
                        $modelP->save();
                    }
                }


                $this->redirect(array("index"));
            }

        }

		$this->render('update',array(
			'model'=>$model,
            'modelTitle'=>$modelTitle,
            "modelKeywords"=>$modelKeywords,
            "modelDescription"=>$modelDescription,
            "modelOther"=>$modelOther,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}



	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{

		$model=new YiiseoUrl('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['YiiseoUrl']))
			$model->attributes=$_GET['YiiseoUrl'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

    /*
    * ajax function
    * add to Form, fields for MetaName
    */
    public function actionAddmetaname(){
        $model = new YiiseoMain;
        $model->name = $_POST['name'];
        $this->renderPartial("_formMetaName",array('model'=>$model));
    }

    /*
    * ajax function
    * delete MetaName
    */
    public function actionDeletemetaname(){
        YiiseoMain::model()->findByPk($_POST['id'])->delete();
    }

    /*
    * ajax function
    * add to Form, fields for MetaProperty
    */
    public function actionAddmetaproperty(){
        $model = new YiiseoProperty();
        $this->renderPartial("_formMetaProperty",array('model'=>$model,'count'=>$_POST['count']));
    }

    /*
    * ajax function
    * delete MetaProperty
    */
    public function actionDeletemetaproperty(){
        YiiseoProperty::model()->findByPk($_POST['id'])->delete();
    }


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=YiiseoUrl::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='yiiseo-url-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /**
     * Получение списка всех моделей в проекте
     */
    public function getModels()
    {
        //путь к директории с проектами
        $file_list = scandir(Yii::getPathOfAlias('application.models'));
        //$file_list = scandir('/var/www/vhosts/powerteam.md/public_html/protected/models');
        $models = null;
        //если найдены файлы
        if(count($file_list))
        {
            foreach($file_list as $file)
            {
                $ext = explode(".",$file);
                //проверяем чтобы модели были с расширением php
                if($ext[1] == "php")
                {
                    $models[] = $ext[0];
                }
            }
        }
        return $models;
    }

    /**
     * Получение списка артибутов всех моделей
     */
    public function getParams(){
        //загружаем модели
        $models = $this->getModels();
        $params= null;
        $i = 0;

        if(count($models)){
            foreach ($models as $model) {

                $modelNew = new $model(null);
                /* проверяем существует ли в данном классе функция "tableName"
                * если она существует, то скорее всего эта модель CActiveRecord
                * таким образом отсеиваем модели, которые были предназначены для валидации форм не работающих с Базой Данных
                */
                if (method_exists($modelNew, "tableName")) {

                    $tableName = $modelNew->tableName();

                    if (($table = $modelNew->getDbConnection()->getSchema()->getTable($tableName)) !== null) {
                        $item = new $model;

                        foreach ($item as $attr => $val) {
                            $params[$i]['group'] = $model;
                            $params[$i]['name'] = $attr;
                            $params[$i++]['value'] = $model . '/' . $attr;
                        }
                        /*
                        * проверяем есть ли связи у данной модели
                        */
                        if (method_exists($item, "relations")) {
                            if (count($item->relations())) {
                                $relation = $item->relations();
                                foreach ($relation as $key => $rel)
                                {
                                    /*
                                    * выбираем связи один к одному или многие к одному
                                    */
                                    if (($rel[0] == "CHasOneRelation") || ($rel[0] == "CBelongsToRelation")) {
                                        $newRel = new $rel[1];
                                        foreach ($newRel as $attr => $nR) {
                                            $params[$i]['group'] = $model;
                                            $params[$i]['name'] = $key . ">>" . $attr;
                                            $params[$i++]['value'] = $model . "/" . $key . ">>" . $attr;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }


            }
            /*
            * если есть модели работающие с базой то возвращаем массив данных
            * иначе возвращаем пустой массив
            */
            if(count($params))
                return $params;
            else
                return array();
        }
        else
            return array();
    }

}
