<?php

class DefaultController extends Controller {

    public $layout='/layouts/column1';
    
    public function actionIndex() {
	$this->render('index');
    }

//    /**
//     * Displays the login page
//     */
//    public function actionLogin()
//    {
//        $this->layout = false;
//        $model=Yii::createComponent('admin.models.LoginForm');
//
//        // collect user input data
//        if(isset($_POST['LoginForm']))
//        {
//            $model->attributes=$_POST['LoginForm'];
//            // validate user input and redirect to the previous page if valid
//            if($model->validate() && $model->login())
//                $this->redirect(array('index'));
//        }
//        // display the login form
//        $this->render('login',array('model'=>$model));
//    }
    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $this->layout = false;
        if (Yii::app()->user->isGuest) {
            $model=Yii::createComponent('admin.models.LoginForm');
            // collect user input data
            if(isset($_POST['LoginForm']))
            {
                $model->attributes=$_POST['LoginForm'];
                // validate user input and redirect to previous page if valid
                if($model->validate()) {
                    $this->lastViset();
                    if (Yii::app()->getBaseUrl()."/index.php" === Yii::app()->user->returnUrl)
                        $this->redirect(array('index'));
                    else
                        $this->redirect(Yii::app()->user->returnUrl);
                }
            }
            // display the login form
            $this->render('login',array('model'=>$model));
        } else
            $this->redirect(array('index'));
    }

    private function lastViset() {
        $lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
        $lastVisit->lastvisit_at = date('Y-m-d H:i:s');
        $lastVisit->save();
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout(false);
        $this->redirect(array('index'));
    }
    
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
	if ($error = Yii::app()->errorHandler->error) {
	    if (Yii::app()->request->isAjaxRequest)
		echo $error['message'];
	    else
		$this->render('error', $error);
	}
    }

}