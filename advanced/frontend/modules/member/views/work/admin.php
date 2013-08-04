<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Item','icon'=>'list','url'=>array('index')),
array('label'=>'Create Item','icon'=>'plus','url'=>array('create')),
);

?>

<h1>Manage Items</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'item-grid',
'dataProvider'=>$model->ownerSearch(),
'filter'=>$model,
'columns'=>array(
		'item_id',
		'category_id',
		'type_id',
		'title',
		'sn',
		'unit',
		/*
		'stock',
		'min_number',
		'market_price',
		'shop_price',
		'currency',
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
		'is_show',
		'is_promote',
		'is_new',
		'is_hot',
		'is_best',
		'is_discount',
		'click_count',
		'sort_order',
		'create_time',
		'update_time',
		'language',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
