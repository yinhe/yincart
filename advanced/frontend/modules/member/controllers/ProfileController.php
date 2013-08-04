<?php

class ProfileController extends Controller {

    public $layout = '//layouts/member';
    
    public function actionIndex() {
        require_once('ucenter.php');
        if ($data = uc_get_user(Yii::app()->user->name)) {
            list($uid, $username, $email) = $data;
        } else {
            echo '用户不存在';
        }
        $this->render('index', array(
            'uid'=>$uid,
            'username'=>$username,
            'email'=>$email
        ));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}