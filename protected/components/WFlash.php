<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class WFlash extends CWidget
{
    public function getAds()
    {
        $cri = new CDbCriteria(array(
                    'order' => 'sort_order asc',
                ));
        $ads = FlashAd::model()->findAll($cri);
        return $ads;
    }
    
    public function run()
    {
        $this->render('flash');
    }
}