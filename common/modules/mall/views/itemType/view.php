<?php
$this->breadcrumbs=array(
	'Item Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ItemType','icon'=>'list','url'=>array('index')),
	array('label'=>'Create ItemType','icon'=>'plus','url'=>array('create')),
	array('label'=>'Update ItemType','icon'=>'pencil','url'=>array('update','id'=>$model->type_id)),
	array('label'=>'Delete ItemType','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ItemType','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View ItemType #<?php echo $model->type_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'type_id',
		'name',
		'enabled',
	),
)); ?>
