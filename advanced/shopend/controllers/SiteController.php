<?php

class SiteController extends Controller
{

    public function accessRules()
    {
        return array(
            // not logged in users should be able to login and view captcha images as well as errors
            array('allow', 'actions' => array('index', 'captcha', 'login', 'error', 'KK')),
            // logged in users can do whatever they want to
            array('allow', 'users' => array('@')),
            // not logged in users can't do anything except above
            array('deny'),
        );
    }

    /**
     * Declares class-based actions.
     * @return array
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }

    /* open on startup */

    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $cri = new CDbCriteria(array(
            'condition' => 'is_show = 1 and is_best = 1'
        ));
        $best_items = Item::model()->findAll($cri);

        $this->render('index', array(
            'best_items' => $best_items
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionCreateStore()
    {
        $model = new Store;
        if (isset($_POST['Store'])) {
//		print_r($_POST);
//		print_r($model->attributes);
//		exit;
            $model->attributes = $_POST['Store'];
            $model->domain = 'shop' . time() . '.' . F::sg('site', 'shopDomain');
            $model->theme = 'default';
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect('http://' . $model->domain);
                }
            } else {
                print_r($model->errors);
            }
        }
    }

    public function actionClear()
    {
        Yii::app()->cache->flush();
        $this->redirect('http://'.F::sg('site', 'backDomain').'/settings/index');
    }

}