<?php
$this->breadcrumbs = array(
    '商品列表' => array('admin'),
    '管理',
);

$this->menu = array(
    array('label' => '创建商品', 'url' => array('create')),
);
?>

<h1>管理商品</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'item-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
//        'item_id',
        'category.name',
        'title',
        'sn',
//        'unit',
        'stock',
        'min_number',
        'market_price',
        'shop_price',
//        'currency',
//        'is_show',
//        'is_promote',
//        'is_new',
//        'is_hot',
//        'is_best',
//        'is_discount',
        /*
          'skus',
          'props',
          'props_name',
          'item_imgs',
          'prop_imgs',
          'pic_url',
          'desc',
          'location',
          'post_fee',
          'express_fee',
          'ems_fee',
          'click_count',
          'sort_order',
          'create_time',
          'update_time',
          'language',
         */
        array(
            'class' => 'CButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/item/view",
array("id" => $data->item_id))',
        ),
    ),
));
?>
