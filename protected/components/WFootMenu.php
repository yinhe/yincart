<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WFootMenu extends CWidget {

    public function getFootMenu() {
        $cri = new CDbCriteria(array(
                    'condition' => 'parent_id = 0 and type = "bottom"',
                    'order' => 'sort_order asc'
                ));
        $models = Menu::model()->findAll($cri);
        return $models;
    }

    public function run() {
        $this->render('footMenu');
    }

}