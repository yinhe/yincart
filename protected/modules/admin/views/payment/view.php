<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	$model->pay_id,
);

$this->menu=array(
	array('label'=>'List Payment', 'url'=>array('index')),
	array('label'=>'Create Payment', 'url'=>array('create')),
	array('label'=>'Update Payment', 'url'=>array('update', 'id'=>$model->pay_id)),
	array('label'=>'Delete Payment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pay_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Payment', 'url'=>array('admin')),
);
?>

<h1>View Payment #<?php echo $model->pay_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pay_id',
		'pay_sn',
		'money',
		'currency',
		'order_id',
		'pay_method',
		'user_id',
		'account',
		'bank',
		'pay_account',
		'status',
		'create_time',
	),
)); ?>
