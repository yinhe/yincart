<?php

class DefaultController extends Controller
{
    public $layout='/layouts/column2';

    public function actionIndex()
    {
        $this->verifyTable();
        $this->redirect(Yii::app()->createUrl("yiiseo/seo/"));
    }

    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
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
        $this->verifyTable();
        $model=Yii::createComponent('yiiseo.models.LoginForm');

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect(Yii::app()->createUrl('yiiseo/seo/index'));
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->userseo->logout(false);
        $this->redirect(Yii::app()->createUrl('yiiseo/seo/index'));
    }

    public function verifyTable()
    {

        if (!Yii::app()->getDb()->schema->getTable('yiiseo_url')) {
            Yii::app()->getDb()->createCommand()->createTable("yiiseo_url", array(
                'id' => 'pk',
                'url' => 'text',
                'language' => 'string',
            ),'ENGINE=InnoDB');
        }

        if (!Yii::app()->getDb()->schema->getTable('yiiseo_main')) {
            Yii::app()->getDb()->createCommand()->createTable("yiiseo_main", array(
                'id' => 'pk',
                'url' => 'integer',
                'name' => 'string',
                'content' => 'text',
                'param' => 'text',
                'active' => 'boolean',
            ),'ENGINE=InnoDB');
            Yii::app()->getDb()->createCommand()->addForeignKey('url', 'yiiseo_main', 'url','yiiseo_url', 'id', 'CASCADE', 'CASCADE');
        }

        if (!Yii::app()->getDb()->schema->getTable('yiiseo_property')) {
            Yii::app()->getDb()->createCommand()->createTable("yiiseo_property", array(
                'id' => 'pk',
                'url' => 'integer',
                'name' => 'string',
                'content' => 'text',
                'param' => 'text',
            ),'ENGINE=InnoDB');
            Yii::app()->getDb()->createCommand()->addForeignKey('url1', 'yiiseo_property', 'url','yiiseo_url', 'id', 'CASCADE', 'CASCADE');
        }

    }
}