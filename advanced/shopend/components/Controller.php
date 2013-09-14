<?php

/**
 * Controller.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/23/12
 * Time: 12:55 AM
 */
class Controller extends CController
{

    public $breadcrumbs = array();
    public $menu = array();

    public function init()
    {
        parent::init();
        $host = Yii::app()->request->hostInfo;
        $domain = str_replace('http://', '', $host);
        if ($host == 'http://'.F::sg('site', 'shopDomain')) {
            Yii::app()->theme = 'store';
        } else {
            $store = Store::model()->findByAttributes(array('domain' => $domain));
            $session = new CHttpSession;
            $session->open();
//	    $session->destroy();
            $session['store'] = array(
                'store_id' => $store->store_id,
                'name' => $store->name,
                'email' => $store->email,
                'theme' => $store->theme
            );
//	    $store_name = $session['store'];  // get session variable 'name1'
//	    foreach ($session as $name => $value) // traverse all session variables
//		$session['name3'] = $value3;  // set session variable 'name3'
//	    echo $store->domain;
//	    exit;
            Yii::app()->theme = $store->theme;
//	    print_r($_SESSION);

        }
//	    exit;
    }

}
