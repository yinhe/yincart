<?php

class AdminModule extends CWebModule
{
    private $_assetsUrl;

    /**
     * Initializes the admin module.
     */
    public function init()
    {
        parent::init();
        Yii::setPathOfAlias('admin',dirname(__FILE__));
        Yii::app()->setComponents(array(
            'errorHandler'=>array(
                'class'=>'CErrorHandler',
                'errorAction'=>$this->getId().'/default/error',
            ),
            'user'=>array(
                'class'=>'WebUser',
                'stateKeyPrefix'=>'admin',
                'loginUrl'=>Yii::app()->createUrl($this->getId().'/default/login'),
            ),
            'widgetFactory' => array(
                'class'=>'CWidgetFactory',
                'widgets' => array()
            )
        ), false);
        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
        ));
    }

    /**
     * @return string the base URL that contains all published asset files of admin.
     */
    public function getAssetsUrl()
    {
        if($this->_assetsUrl===null)
            $this->_assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('admin.assets'));
        return $this->_assetsUrl;
    }

    /**
     * @param string $value the base URL that contains all published asset files of admin.
     */
    public function setAssetsUrl($value)
    {
        $this->_assetsUrl=$value;
    }

    /**
     * Performs access check to admin.
     * This method will check to see if user IP and password are correct if they attempt
     * to access actions other than "default/login" and "default/error".
     * @param CController $controller the controller to be accessed.
     * @param CAction $action the action to be accessed.
     * @throws CHttpException if access denied
     * @return boolean whether the action should be executed.
     */
    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action))
        {
            $route=$controller->id.'/'.$action->id;
            if(!$this->allowIp(Yii::app()->request->userHostAddress) && $route!=='default/error')
                throw new CHttpException(403,"You are not allowed to access this page.");

            $publicPages=array(
                'default/login',
                'default/error',
            );
//            $store = Store::model()->findByPk($_SESSION['store']['store_id']);
            if(Yii::app()->user->isGuest && !in_array($route,$publicPages))
                Yii::app()->user->loginRequired();
            else
                return true;
        }
        return false;
    }

    /**
     * Checks to see if the user IP is allowed by {@link ipFilters}.
     * @param string $ip the user IP
     * @return boolean whether the user IP is allowed by {@link ipFilters}.
     */
    protected function allowIp($ip)
    {
        if(empty($this->ipFilters))
            return true;
        foreach($this->ipFilters as $filter)
        {
            if($filter==='*' || $filter===$ip || (($pos=strpos($filter,'*'))!==false && !strncmp($ip,$filter,$pos)))
                return true;
        }
        return false;
    }
}
