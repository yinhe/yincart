<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaidumapAction
 *
 * @author kowloon29320@163.com
 */
class BaidumapAction extends CAction{
    
    public function run() {
        $lnglat = Yii::app()->request->getParam('lnglat');
        if(!$lnglat)
        {
           
           $lnglat='39.904667,116.408198'; //默认北京
            
        }
        list($lat,$lng) = preg_split('/[,\s]+/',$lnglat,-1,PREG_SPLIT_NO_EMPTY);
        $this->controller->renderPartial('application.actions.baidu.views.baidu_map',array('lat'=>$lat,'lng'=>$lng)); 
    }
}

?>
