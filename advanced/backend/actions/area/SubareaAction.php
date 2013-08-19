<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubareaAction
 *
 * @author Administrator
 */
class SubareaAction extends CAction{
    
    public function run() {
        $pid = Yii::app()->request->getParam('pid');
        $grade = Yii::app()->request->getParam('grade');
        echo ARArea::getChildOptionStr($pid, $grade);
    }
}

?>
