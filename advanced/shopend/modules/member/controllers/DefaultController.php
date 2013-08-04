<?php

class DefaultController extends Controller {

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
                'actions' => array('index', 'myOrder', 'orderView'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionMyOrder() {
        $cri = new CDbCriteria(array(
                    'condition' => 'user_id =' . Yii::app()->user->id
                ));
        $myorders = Orders::model()->findAll($cri);

        $this->render('myOrder', array(
            'myorders' => $myorders
        ));
    }

    public function actionOrderView() {
        $id = $_REQUEST['id'];

        $cri = new CDbCriteria(array(
                    'condition' => 'order_id =' . $id
                ));

        $model = Orders::model()->find($cri);

        $this->render('orderView', array(
            'model' => $model
        ));
    }

}