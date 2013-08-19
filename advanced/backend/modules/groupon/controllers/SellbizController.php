<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SellbizController
 * 销售商家控制器
 * @author Administrator
 */
class SellbizController extends LonxomController{
    //商家列表
    public function actionIndex() {
        $model = new SellBizSFM();
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

    //创建商家
    public function actionCreate(){
        $model = new ARBiz('sell');
//        dump($model);
        $this->performAjaxValidation($model);
        if(!empty($_POST)){
//            dump($_POST);
            $model->attributes = $_POST['ARBiz'];
            //创建者
            $model->create_id = Yii::app()->user->id;
//            dump($_FILES);
//            控制器中使用实例如下：
            $upload = new FileUpload(array($model,'license_photo'), 'upload/groupon');
            //model处理文件上传  $upload = new FileUpload(array($model,'pic'),'upload/goods');
            if(!$upload->isNull()){
               if($filename = $upload->save()){
                      $model->license_photo = $filename;
//                      dump($filename);
               }else{
                   print_r($upload->getErrors());
                   throw new CHttpException('300','文件上传失败');
               }
            }
            if($model->save()){
                $this->go('商家添加成功', array('index'), 'success');
            }
        }
        $this->render('create',array(
            'model'=>$model,
        ));
    }
    
    //修改商家
    public function actionUpdate($id){
        $model = $this->loadBiz(trim($id));
        $model->setScenario('sell');
        $this->performAjaxValidation($model);
        if(!empty($_POST)){
            $model->attributes = $_POST['ARBiz'];
//            dump($_FILES);
//            控制器中使用实例如下：
            $upload = new FileUpload(array($model,'license_photo'), 'upload/groupon');
            //model处理文件上传  $upload = new FileUpload(array($model,'pic'),'upload/goods');
            if(!$upload->isNull()){
               if($filename = $upload->save()){
                      $model->license_photo = $filename;
//                      dump($filename);
               }else{
                   print_r($upload->getErrors());
                   throw new CHttpException('300','文件上传失败');
               }
            }
//            dump($model->attributes);
            if($model->save()){
//                $return_url = $_POST['return_url'];
                $this->redirect(array('index'));
            }
        }
        $this->render('update',array(
            'model'=>$model,
        ));
    }

    //添加分店
    public function actionAddshop(){
        
    }
    
    protected function loadBiz($id){
        $model = ARBiz::model()->findByPk($id);
        if($model == null){
            throw new CHttpException(404,'找不到该商家');
        }
        return $model;
    }

    public function performAjaxValidation($model){
        if(isset($_POST['ajax']) && $_POST['ajax']==='arbiz-create-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

?>
