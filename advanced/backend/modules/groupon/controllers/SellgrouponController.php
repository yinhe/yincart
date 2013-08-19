<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SellgrouponController
 * 销售团购控制器
 * @author Administrator
 */
class SellgrouponController extends LonxomController{
    
    //团购列表
    public function actionIndex(){
        //搜素表单model
        $model = new SellGrouponSFM();
        //生成搜素表单
        $form = BootForm::createForm($model->getFMConfig(),$model);
//        dump($form);
        $query = $model->getQuery();
        //获取data提供器
        $dataProvider = new QueryDataProvider($query,array(
            'pagination'=>array(
                'pageSize'=>10,
            ),
        ));
        
        $this->render('index',array(
            'form'=>$form,
            'dataProvider'=>$dataProvider,
        ));
    }
    
    //添加团购
    public function actionCreate(){
        
    }
}

?>
