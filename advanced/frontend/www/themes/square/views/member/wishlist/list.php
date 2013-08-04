<?php

$this->breadcrumbs = array(
    '我的收藏' => array('list'),
    '管理',
);
?>

<h3>我的收藏</h3>

<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'wishlist-grid',
    'dataProvider' => $model->search(),
//    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'item.title',
            'value' => '$data->item->title',
        ),
        array(
            'name' => 'item.sn',
            'value' => '$data->item->sn',
        ),
        array(
            'name' => 'item.market_price',
            'value' => '$data->item->market_price',
        ),
        array(
            'name' => 'item.shop_price',
            'value' => '$data->item->shop_price',
        ),
        array(
            'name' => 'create_time',
            'value' => 'date("Y-m-d", $data->create_time)',
            'htmlOptions' => array('style'=>'width:100px')
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
//            'template' => '{view}{update}{delete}',
            'viewButtonUrl' => 'Yii::app()->createUrl("/item/view",
array("id" => $data->item_id))',
        ),
    ),
));
?>
    </div>
</div>

