<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id,
);

$this->menu=array(
	array('label'=>'List Orders', 'url'=>array('index')),
	array('label'=>'Create Orders', 'url'=>array('create')),
	array('label'=>'Update Orders', 'url'=>array('update', 'id'=>$model->order_id)),
	array('label'=>'Delete Orders', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->order_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Orders', 'url'=>array('admin')),
);
?>

<h1>View Orders #<?php echo $model->order_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'order_id',
		'order_sn',
		'user_id',
		'user_name',
		'email',
		'address',
		'postcode',
		'tel_no',
		'content',
	),
)); ?>
