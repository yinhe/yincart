<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShopController
 * 商家分店控制器
 * @author kowloon29320@163.com
 */
class ShopController extends LonxomController{
    
    public function actionCreate(){
        $biz_id = Yii::app()->request->getParam('biz_id');
        if(empty($biz_id)){
            $this->go('请选择具体的商家', Yii::app()->request->urlReferrer);
        }
        $biz = ARBiz::model()->findByPk($biz_id);
        if($biz == null){
            $this->go('该商家不存在', Yii::app()->request->urlReferrer);
        }
        $model = new ARBizShop('sell');
        $model->biz_id = $biz->id;
        $this->performAjaxValidation($model);
        if(Yii::app()->request->isPostRequest && !empty($_POST['ARBizShop'])){
            $model->attributes = $_POST['ARBizShop'];
            if($model->save()){
               $this->go('<strong>分店添加成功</strong>',$_POST['return_url'],'success'); 
            }
        }
        $this->render('create',array(
            'model'=>$model,
            'biz'=>$biz,
        ));
    }
    
    public function actionUpdate($id){
       $model = ARBizShop::model()->findByPk($id);
       if($model == NULL){
           $this->go('该分店不存在', Yii::app()->request->urlReferrer);
       }
       $model->setScenario('sell');
       $this->performAjaxValidation($model);
       if(Yii::app()->request->isPostRequest && !empty($_POST['ARBizShop'])){
            $model->attributes = $_POST['ARBizShop'];
            if($model->save()){
               $this->go('<strong>分店修改成功</strong>',$_POST['return_url'],'success'); 
            }
        }
        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionIndex() {
        $model = new SellShopSFM();
        $form = BootForm::createForm($model->getFMConfig(), $model);
        $query = $model->getQuery();
        //获取data提供器
        $dataProvider = new QueryDataProvider($query, array(
                    'pagination' => array(
                        'pageSize' => 10,
                    ),
                ));

        $this->render('index', array(
            'form' => $form,
            'dataProvider' => $dataProvider,
        ));
    }


    public function performAjaxValidation($model){
        if(isset($_POST['ajax']))
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

?>
