<?php
$this->breadcrumbs = array(
    '商家列表',
);

$this->menu = array(
    array('label' => '创建商家', 'icon' => 'plus', 'url' => array('create')),
);

//dump($form);
echo $form;
?>
<h3>管理团购商家</h3>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'groupon-grid',
    'dataProvider' => $dataProvider,
    'type' => 'striped bordered condensed',
//    'selectableRows' => 2,
    'columns' => array(
//        array(
//            'class' => 'CCheckBoxColumn',
//            'name' => 'item_id',
//            'value' => '$data->item_id',
//        ),
        array(
            'name' => 'ID',
            'value' => '$data["id"]',
        ),
        array(
            'name' => '商家名称',
            'value' => '$data["title"]',
        ),
        array(
            'name' => '审核信息',
            'type'=>'raw',
            'value' => 'SellBizSFM::examineInfo($data)',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => '操作',
            'template' => "{edit} {addshop} {shops} {addcontract}",
            'buttons' => array(
                'edit' => array(
                    'label' => '修改',
                    'url' => 'Yii::app()->controller->createUrl("biz/update",array("id"=>$data["id"]))',
                    'icon' => 'icon-edit',
                    'options' => array('style' => 'margin-left:8px;'),
                ),
                'addshop' => array(
                    'label' => '添加商户分店',
                    'url' => 'Yii::app()->controller->createUrl("shop/create",array("biz_id"=>$data["id"]))',
                    'icon' => 'icon-plus',
                    'options' => array('style' => 'margin-left:8px;'),
                ),
                'shops' => array(
                    'label' => '查看项目分店',
                    'url' => 'Yii::app()->controller->createUrl("shop/index",array("biz_id"=>$data["id"]))',
                    'icon' => 'icon-film',
                    'options' => array('style' => 'margin-left:8px;','target'=>'_blank'),
                ),
                'addcontract' => array(
                    'label' => '添加商户合同',
                    'url' => 'Yii::app()->controller->createUrl("contract/create",array("biz_id"=>$data["id"]))',
                    'icon' => 'icon-book',
                    'options' => array('style' => 'margin-left:8px;'),
//                    'visible'=>''
                ),
//                'shops' => array(
//                    'label' => '查看项目分店信息',
//                    'url' => 'Yii::app()->controller->createUrl("/ajax/baidu/shops",array("id"=>$data["id"]))',
//                    'icon' => 'icon-film',
//                    'click' => 'function(){jQuery.facebox({ajax: $(this).attr("href")}); return false;}',
//                    'options' => array('style' => 'margin-left:8px;'),
//                ),
            ),
            'htmlOptions'=>array('class'=>'span2'),
        ),
    ),
));
?>
