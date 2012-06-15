<?php
$this->breadcrumbs = array(
    '商品列表' => array('admin'),
    '管理',
);

$this->menu = array(
    array('label' => '创建商品', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('item-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理商品</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'item-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
            'name' => 'item_id',
            'value' => '$data->item_id',
        ),
        'category.category_name',
        'brand.brand_name',
        'item_name',
        'item_sn',
        'market_price',
        'shop_price',
        array(
            'name' => 'is_show',
            'value' => '$data->getShow()',
        ),
        array(
            'name' => 'is_promote',
            'value' => '$data->getPromote()',
        ),
        array(
            'name' => 'is_new',
            'value' => '$data->getNew()',
        ),
        array(
            'name' => 'is_hot',
            'value' => '$data->getHot()',
        ),
        array(
            'name' => 'is_best',
            'value' => '$data->getBest()',
        ),
        /*
          'stock',
          'min_number',
          'market_price',
          'shop_price',
          'props',
          'props_name',
          'prop_imgs',
          'item_image',
          'item_imgs',
          'item_desc',
          'is_show',
          'is_promote',
          'is_new',
          'is_hot',
          'is_best',
          'click_count',
          'sort_order',
          'create_time',
          'update_time',
          'language',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
