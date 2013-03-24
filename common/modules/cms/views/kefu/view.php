<?php
$this->breadcrumbs=array(
	'Kefus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kefu', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Kefu', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update Kefu', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kefu', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kefu', 'icon'=>'cog','url'=>array('admin')),
);
?>

<div class="box">
<div class="box-title2">View Kefu #<?php echo $model->id; ?></div>
<div class="box-content">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'nick_name',
		'account',
		'if_show',
		'sort_order',
	),
)); ?>
</div>
</div>