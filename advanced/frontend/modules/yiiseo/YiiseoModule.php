<?php

class YiiseoModule extends CWebModule
{
    public $password;
    private $_assetsUrl;
    public function init()
    {
        parent::init();
        Yii::app()->setComponents(array(
            'errorHandler'=>array(
                'class'=>'CErrorHandler',
                'errorAction'=>$this->getId().'/default/error',
            ),
            'userseo'=>array(
                'class'=>'CWebUser',
                'stateKeyPrefix'=>'seo',
                'loginUrl'=>Yii::app()->createUrl($this->getId().'/default/login'),
            ),
        ), false);
        $this->setImport(array(
            'yiiseo.models.*',
            'yiiseo.components.*',
        ));
    }



    public function beforeControllerAction($controller, $action)
    {
    if(parent::beforeControllerAction($controller, $action))
    {
        $route=$controller->id.'/'.$action->id;
        $publicPages=array(
            'default/login',
            'default/error',
        );
        if($this->password!==false && Yii::app()->userseo->isGuest && !in_array($route,$publicPages))
            Yii::app()->userseo->loginRequired();
        else
            return true;
    }
    return false;
}

/**
     * @return string the base URL that contains all published asset files of gii.
     */
    public function getAssetsUrl()
    {
        if($this->_assetsUrl===null)
            $this->_assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('yiiseo.assets'));
        return $this->_assetsUrl;
    }

    /**
     * @param string $value the base URL that contains all published asset files of gii.
     */
    public function setAssetsUrl($value)
    {
        $this->_assetsUrl=$value;
    }
}
