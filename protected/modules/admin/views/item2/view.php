<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->item_id,
);

$this->menu=array(
	array('label'=>'List Item', 'url'=>array('index')),
	array('label'=>'Create Item', 'url'=>array('create')),
	array('label'=>'Update Item', 'url'=>array('update', 'id'=>$model->item_id)),
	array('label'=>'Delete Item', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->item_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Item', 'url'=>array('admin')),
);
?>

<h1>View Item #<?php echo $model->item_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'item_id',
		'category_id',
		'brand_id',
		'item_name',
		'item_sn',
		'unit',
		'stock',
		'min_number',
		'market_price',
		'shop_price',
                'currency', 
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
	),
)); ?>
