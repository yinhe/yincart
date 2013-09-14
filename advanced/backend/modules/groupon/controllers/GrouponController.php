<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GrouponController
 * 销售团购控制器
 * @author kowloon29320@163.com
 */
class GrouponController extends LonxomController{
    
    //团购列表
    public function actionIndex(){
        //搜素表单model
        $model = new SellGrouponSFM();
        //生成搜素表单
        $form = BootForm::createForm($model->getFMConfig(),$model);
//        dump($form);
        $query = $model->getQuery();
        //获取data提供器
        $dataProvider = new QueryDataProvider($query,array(
            'pagination'=>array(
                'pageSize'=>10,
            ),
        ));
        
        $this->render('index',array(
            'form'=>$form,
            'dataProvider'=>$dataProvider,
        ));
    }
    
    //添加团购
    public function actionCreate(){
        $model = new ARGroupon('sell');
        
        $this->performAjaxValidation($model);
        if(!empty($_POST['ARGroupon'])){
//            dump($_FILES);
//            dump($_POST);exit;
            $model->attributes = $_POST['ARGroupon'];
            if($model->validate()){
                $fileUpload = new FileUpload(array($model,'image'), 'upload/groupon');
                if(!$fileUpload->isNull()){
                    $filename = $fileUpload->save();
                    if($filename){
                        $model->image = $filename;
                    }else{
                        $error = var_export($fileUpload->getErrors(), true);
                        $model->addError('image', $error);
                    }
                }else{
                    $model->addError('image', '主图必须上传');
                }
                if($model->image){
                    //如果有图上传
                    $model->begin_time = strtotime($model->begin_time);
                    $model->end_time = strtotime($model->end_time);
                    $model->expire_time = strtotime($model->expire_time);
                    $model->create_id = Yii::app()->user->id;
                    if($model->save()){
                        Yii::app()->user->setFlash('success','商品添加成功');
    //                    $url = $_POST['return_url'];
    //                    $this->go('商品添加成功', $url, 'success');
                    }
                }
            }
            
            
        }
        $this->render('create',array(
            'model'=>$model,
        ));
    }
    
    public function actionUpdate($id){
        $model = ARGroupon::model()->findByPk($id);
        if($model == null){
            $this->go('该商品不存在', Yii::app()->request->urlReferrer);
        }
        $model->setScenario('sell');
        $this->performAjaxValidation($model);
        if(!empty($_POST['ARGroupon'])){
//            dump($_FILES);
//            dump($_POST);exit;
            $model->attributes = $_POST['ARGroupon'];
            if($model->validate()){
                $fileUpload = new FileUpload(array($model,'image'), 'upload/groupon');
                if(!$fileUpload->isNull()){
                    $filename = $fileUpload->save();
                    if($filename){
                        $model->image = $filename;
                    }else{
                        dump($fileUpload->getErrors());
                        throw new CHttpException(300,'图片上传出错');
                    }
                }
                
                $model->begin_time = strtotime($model->begin_time);
                $model->end_time = strtotime($model->end_time);
                $model->expire_time = strtotime($model->expire_time);
                if($model->save()){
                    Yii::app()->user->setFlash('success','商品修改成功');
//                    $url = $_POST['return_url'];
//                    $this->go('商品修改成功', $url, 'success');
                }
                
            }
        }
        $this->render('update',array(
            'model'=>$model,
        ));
    }
}

?>
