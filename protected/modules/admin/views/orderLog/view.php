<?php
$this->breadcrumbs=array(
	'Order Logs'=>array('index'),
	$model->log_id,
);

$this->menu=array(
	array('label'=>'List OrderLog', 'url'=>array('index')),
	array('label'=>'Create OrderLog', 'url'=>array('create')),
	array('label'=>'Update OrderLog', 'url'=>array('update', 'id'=>$model->log_id)),
	array('label'=>'Delete OrderLog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->log_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderLog', 'url'=>array('admin')),
);
?>

<h1>View OrderLog #<?php echo $model->log_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'log_id',
		'order_id',
		'op_id',
		'op_name',
		'log_text',
		'action_time',
		'behavior',
		'result',
	),
)); ?>
