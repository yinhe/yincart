<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WHelpCenter extends CWidget {
    
    public function getHelp()
    {
        $cri = new CDbCriteria(array(
                    'condition' => 'parent_id = 3',
                ));
        $ContentCategory = ContentCategory::model()->findAll($cri);
        return $ContentCategory;
    }
    public function run() {
        $this->render('helpCenter');
    }

}