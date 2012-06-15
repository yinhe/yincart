<?php
$this->breadcrumbs=array(
	'Brands'=>array('index'),
	$model->value_id,
);

$this->menu=array(
	array('label'=>'List Brand', 'url'=>array('index')),
	array('label'=>'Create Brand', 'url'=>array('create')),
	array('label'=>'Update Brand', 'url'=>array('update', 'id'=>$model->value_id)),
	array('label'=>'Delete Brand', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->value_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Brand', 'url'=>array('admin')),
);
?>

<h1>View Brand #<?php echo $model->value_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'value_id',
		'value_name',
		'prop_id',
		'prop_name',
	),
)); ?>
