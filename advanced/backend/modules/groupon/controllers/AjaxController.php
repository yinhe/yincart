<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxController
 *
 * @author Administrator
 */
class AjaxController extends LonxomController{
    
    public function actions() {
        return array(
            'subarea' => array(
                'class' => 'application.actions.area.SubareaAction'
            ),
        );
    }
}

?>
