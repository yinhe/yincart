<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SellshopController
 * 商家分店控制器
 * @author Administrator
 */
class SellshopController extends LonxomController{
    
    public function actionCreate(){
        $biz_id = Yii::app()->request->getParam('biz_id');
        if(empty($biz_id)){
            $this->go('请选择具体的商家', Yii::app()->request->urlReferrer);
        }
        $biz = ARBiz::model()->findByPk($biz_id);
        if($biz == null){
            $this->go('该商家不存在', Yii::app()->request->urlReferrer);
        }
        $model = new ARBizShop('sell');
        $model->biz_id = $biz->id;
        $this->render('create',array(
            'model'=>$model,
            'biz'=>$biz,
        ));
    }
}

?>
