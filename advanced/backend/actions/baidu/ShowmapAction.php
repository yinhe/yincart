<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShowmapAction
 *
 * @author Jiulong Zhang <kowloon29320@163.com>
 */
class ShowmapAction extends CAction{
    
    public function run() {
        $this->controller->layout = false;
        $lng = Yii::app()->request->getParam('lng');
        $lat = Yii::app()->request->getParam('lat');
//      var_dump(Yii::app()->basePath);exit;
        $this->controller->render('application.actions.baidu.views.show_map',array(
            'lng'=>$lng,
            'lat'=>$lat,
        ));
    }
}

?>
