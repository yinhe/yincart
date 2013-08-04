<?php

class DefaultController extends Controller {

    public $layout = '/layouts/admin';
    
    public function actionIndex() {
	$this->render('index');
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