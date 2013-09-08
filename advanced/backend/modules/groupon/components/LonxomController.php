<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LonxomController
 * 团购公共控制器类
 * @author kowloon29320@163.com
 */
class LonxomController extends Controller{
    public $now;    //当前时间戳
    public $layout = '//layouts/groupon';
    
    public function init() {
        parent::init();
        $this->now = time();
    }
    
   /**
    * 设置正确/错误消息，并跳转到指定Url
    * @param string $msg
    * @param array/ $url
    * @param string $type error info success
    */
    public function go($msg,$url,$type='error'){
        Yii::app()->user->setFlash($type,$msg);
        $this->redirect($url);
    }
    
    public function performAjaxValidation($model){
        if(isset($_POST['ajax']))
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

?>
