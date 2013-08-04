<?php
$this->breadcrumbs=array(
	'Wishlists'=>array('index'),
	$model->wishlist_id,
);

$this->menu=array(
	array('label'=>'Create Wishlist', 'url'=>array('create')),
	array('label'=>'Update Wishlist', 'url'=>array('update', 'id'=>$model->wishlist_id)),
	array('label'=>'Delete Wishlist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->wishlist_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Wishlist', 'url'=>array('list')),
);
?>

<h3>View Wishlist #<?php echo $model->wishlist_id; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'wishlist_id',
		'user_id',
		'item_id',
		'desc',
		'create_time',
	),
)); ?>
