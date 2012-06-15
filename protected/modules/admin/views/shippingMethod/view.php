<?php
$this->breadcrumbs=array(
	'Shipping Methods'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ShippingMethod', 'url'=>array('index')),
	array('label'=>'Create ShippingMethod', 'url'=>array('create')),
	array('label'=>'Update ShippingMethod', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ShippingMethod', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ShippingMethod', 'url'=>array('admin')),
);
?>

<h1>View ShippingMethod #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
		'desc',
		'enabled',
		'is_cod',
		'sort_order',
	),
)); ?>
