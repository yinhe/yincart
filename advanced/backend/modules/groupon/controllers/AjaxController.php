<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxController
 *
 * @author kowloon29320@163.com
 */
class AjaxController extends LonxomController{
    
    public function actions() {
        return array(
            'subarea' => array(
                'class' => 'application.actions.area.SubareaAction'
            ),
            'baidumap'=>array(
                'class'=>'application.actions.baidu.BaidumapAction'
            ),
            'showmap'=>array(
                'class'=>'application.actions.baidu.ShowmapAction'
            ),
        );
    }
    
}

?>
