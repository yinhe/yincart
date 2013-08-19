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
    'id' => 'sellgroupon-grid',
    'dataProvider' => $dataProvider,
    'type'=>'striped bordered condensed',
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
            'name' => '团购名称',
            'value' => '$data["short_title"]',
        ),
        array(
            'name' => '团购主图',
            'value' => 'SellGrouponSFM::imageInfo($data)',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header'=>'操作',
            'template'=>"{addshop} {shops}",
            'buttons'=>array(
                'addshop'=>array(
                    'label'=>'添加商户分店信息',
                    'url'=>'Yii::app()->controller->createUrl("/thirdpart/baidu/addshop",array("id"=>$data["id"],"tpid"=>$data["tpid"]))',
                    'icon'=>'icon-plus',
                    'options'=>array('style'=>'margin-left:8px;'),
                ),
                'shops'=>array(
                    'label'=>'查看项目分店信息',
                    'url'=>'Yii::app()->controller->createUrl("/ajax/baidu/shops",array("id"=>$data["id"]))',
                    'icon'=>'icon-film',
                    'click'=>'function(){jQuery.facebox({ajax: $(this).attr("href")}); return false;}',
                    'options'=>array('style'=>'margin-left:8px;'),
                ),
            ),
        ),
    ),
));
?>