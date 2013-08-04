<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WAd extends CWidget {

    public function init() {
        parent::init();
    }

    public function run() {
        $cri = new CDbCriteria(array(
            'order' => 'sort_order asc',
        ));
        $ads = Ad::model()->findAll($cri);
        $this->render('ad', array(
            'ads' => $ads
                )
        );
    }

}