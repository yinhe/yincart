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
    
    //分类
    public function actionCate(){
        if(Yii::app()->request->isAjaxRequest){
            $pid = Yii::app()->request->getParam('pid');
            $level = Yii::app()->request->getParam('level');
            echo ARCates::getChildOptionStr($pid,$level);
        }
    }
    
    //获取商家
    public function actionBiz(){
        if(Yii::app()->request->isAjaxRequest){
            $optionStr = CHtml::tag('option', array('value'=>''), '请选择');
            $contract_id = Yii::app()->request->getParam('contract_id');
            $biz_id = Yii::app()->db->createCommand()->select('biz_id')->from('groupon_contract')->where('id=:id',array(':id'=>$contract_id))->queryScalar();
            if($biz_id){
                $biz = Yii::app()->db->createCommand()->select('id,title')->from('groupon_biz')->where('id=:id',array(':id'=>$biz_id))->queryRow();
                if(!empty($biz)){
                    $optionStr = CHtml::tag('option', array('value'=>$biz['id']), $biz['title']);
                }
            }
            echo $optionStr;
        }
    }
    
    
}

?>
