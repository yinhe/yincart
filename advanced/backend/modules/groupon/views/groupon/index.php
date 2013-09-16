<?php
$this->breadcrumbs = array(
    '商品列表' => array('index'),
    '管理',
);

$this->menu = array(
    array('label' => '创建团购', 'icon' => 'plus', 'url' => array('create')),
);

//dump($form);
echo $form;
?>
<h3>管理团购商品</h3>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'groupon-grid',
    'dataProvider' => $dataProvider,
    'type'=>'striped bordered condensed',
//    'selectableRows' => 2,
    'columns' => array(
//        array(
//            'class' => 'CCheckBoxColumn',
//            'name' => 'id',
//            'value' => '$data["id"]',
//        ),
        array(
            'name' => 'ID',
            'value' => '$data["id"]',
        ),
        array(
            'name' => '团购名称',
            'value' => '$data["short_title"]',
        ),
        array(
            'name' => '状态',
            'type'=>'raw',
            'value' => 'SellGrouponSFM::statusInfo($data)',
        ),
        array(
            'name' => '团购主图',
            'type'=>'raw',
            'value' => 'SellGrouponSFM::imageInfo($data)',
        ),
        array(
            'name' => '商家信息',
            'type'=>'raw',
            'value' => 'SellGrouponSFM::bizInfo($data)',
        ),
        array(
            'name' => '分类信息',
            'type'=>'raw',
            'value' => 'SellGrouponSFM::cateInfo($data)',
        ),
        array(
            'name' => '价格',
            'type'=>'raw',
            'value' => 'SellGrouponSFM::priceInfo($data)',
        ),
        array(
            'name' => '时间',
            'type'=>'raw',
            'value' => 'SellGrouponSFM::timeInfo($data)',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header'=>'操作',
            'template'=>"{edit}",
            'buttons'=>array(
                'edit'=>array(
                    'label'=>'修改',
                    'url'=>'Yii::app()->controller->createUrl("/groupon/groupon/update",array("id"=>$data["id"]))',
                    'icon'=>'icon-edit',
                    'options'=>array('style'=>'margin-left:8px;'),
                ),
//                'shops'=>array(
//                    'label'=>'查看项目分店信息',
//                    'url'=>'Yii::app()->controller->createUrl("/ajax/baidu/shops",array("id"=>$data["id"]))',
//                    'icon'=>'icon-film',
//                    'click'=>'function(){jQuery.facebox({ajax: $(this).attr("href")}); return false;}',
//                    'options'=>array('style'=>'margin-left:8px;'),
//                ),
            ),
            'htmlOptions'=>array('class'=>'span1')
        ),
    ),
));
?>