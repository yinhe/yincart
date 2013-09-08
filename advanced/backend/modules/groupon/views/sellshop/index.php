<?php
$this->breadcrumbs = array(
    '商家分店列表',
);

//dump($form);
echo $form;
?>
<h3>管理团购商家分店</h3>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'shop-grid',
    'dataProvider' => $dataProvider,
    'type' => 'striped bordered condensed hover',
//    'selectableRows' => 2,
    'columns' => array(
//        array(
//            'class' => 'CCheckBoxColumn',
//            'name' => 'item_id',
//            'value' => '$data->item_id',
//        ),
        array(
            'name' => 'id',
        ),
        array(
            'name' => 'biz_id',
            'header'=>'商家信息',
            'type' => 'raw',
            'value' => 'SellShopSFM::bizInfo($data)',
        ),
        array(
            'name' => 'name',
            'header'=>'分店名'
        ),
        array(
            'name' => 'city_id',
            'header'=>'城市信息',
            'type' => 'raw',
            'value' => 'SellShopSFM::cityInfo($data)',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => '操作',
            'template' => "{edit}",
            'buttons' => array(
                'edit' => array(
                    'label' => '修改',
                    'url' => 'Yii::app()->controller->createUrl("shop/update",array("id"=>$data["id"]))',
                    'icon' => 'icon-edit',
                    'options' => array('style' => 'margin-left:8px;'),
                ),
            ),
        ),
    ),
));
?>