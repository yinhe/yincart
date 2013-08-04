<?php

class OrderlistController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/member';

    /**
     * @return array action filters
     */
    public function filters() {
	return array(
	    'accessControl', // perform access control for CRUD operations
	);
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
	return array(
	    array('allow', // allow authenticated user to perform 'create' and 'update' actions
		'actions' => array('list', 'create', 'update', 'view'),
		'users' => array('@'),
	    ),
	    array('deny', // deny all users
		'users' => array('*'),
	    ),
	);
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
	$this->render('view', array(
	    'model' => $this->loadModel($id),
	));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
	$model = $this->loadModel($id);

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if (isset($_POST['Order'])) {
	    $model->attributes = $_POST['Order'];
	    if ($model->save())
		$this->redirect(array('view', 'id' => $model->order_id));
	}

	$this->render('update', array(
	    'model' => $model,
	));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'list' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
	if (Yii::app()->request->isPostRequest) {
	    // we only allow deletion via POST request
	    $this->loadModel($id)->delete();

	    // if AJAX request (triggered by deletion via list grid view), we should not redirect the browser
	    if (!isset($_GET['ajax']))
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('list'));
	}
	else
	    throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionList() {
//		$model=new Order('ownerSearch');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['Order']))
//			$model->attributes=$_GET['Order'];

	$criteria = new CDbCriteria(array(
	    'condition'=>'user_id ='.Yii::app()->user->id
	));
	$count = Order::model()->count($criteria);
	$pages = new CPagination($count);

	// results per page
	$pages->pageSize = 10;
	$pages->applyLimit($criteria);
	$models = Order::model()->findAll($criteria);

	$this->render('list', array(
	    'models' => $models,
	    'pages' => $pages
	));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
	$model = Order::model()->findByPk($id);
	if ($model === null)
	    throw new CHttpException(404, 'The requested page does not exist.');
	return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
	if (isset($_POST['ajax']) && $_POST['ajax'] === 'order-form') {
	    echo CActiveForm::validate($model);
	    Yii::app()->end();
	}
    }

}
