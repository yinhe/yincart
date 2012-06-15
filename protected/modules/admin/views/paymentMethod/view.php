<?php
$this->breadcrumbs=array(
	'Payment Methods'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List PaymentMethod', 'url'=>array('index')),
	array('label'=>'Create PaymentMethod', 'url'=>array('create')),
	array('label'=>'Update PaymentMethod', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PaymentMethod', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PaymentMethod', 'url'=>array('admin')),
);
?>

<h1>View PaymentMethod #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
		'desc',
		'config',
		'enabled',
		'is_cod',
		'is_online',
		'sort_order',
	),
)); ?>
