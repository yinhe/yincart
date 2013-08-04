<?php
$this->breadcrumbs=array(
	'Stores'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Store','icon'=>'list','url'=>array('index')),
array('label'=>'Create Store','icon'=>'plus','url'=>array('create')),
array('label'=>'Update Store','icon'=>'pencil','url'=>array('update','id'=>$model->store_id)),
array('label'=>'Delete Store','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->store_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Store','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View Store #<?php echo $model->store_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'store_id',
		'user_id',
		'name',
		'email',
		'password',
		'domain',
		'type',
		'years',
		'theme',
		'start_time',
		'end_time',
		'introduction',
		'create_time',
		'update_time',
),
)); ?>
