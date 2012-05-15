<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class WFlash extends CWidget
{
    public function run()
    {
        $image = Yii::app()->request->baseUrl.'/lib/flash/';
        $this->render('flash', array('image'=>$image));
    }
}