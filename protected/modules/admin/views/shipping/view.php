<?php
$this->breadcrumbs=array(
	'Shippings'=>array('index'),
	$model->ship_id,
);

$this->menu=array(
	array('label'=>'List Shipping', 'url'=>array('index')),
	array('label'=>'Create Shipping', 'url'=>array('create')),
	array('label'=>'Update Shipping', 'url'=>array('update', 'id'=>$model->ship_id)),
	array('label'=>'Delete Shipping', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ship_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Shipping', 'url'=>array('admin')),
);
?>

<h1>View Shipping #<?php echo $model->ship_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ship_id',
		'order_id',
		'user_id',
		'ship_sn',
		'type',
		'ship_method',
		'ship_fee',
		'op_name',
		'status',
		'receiver_name',
		'receiver_phone',
		'receiver_mobile',
		'location',
		'create_time',
		'update_time',
	),
)); ?>
