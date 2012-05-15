<?php
$this->breadcrumbs=array(
	'Kefus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kefu', 'url'=>array('index')),
	array('label'=>'Create Kefu', 'url'=>array('create')),
	array('label'=>'Update Kefu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kefu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kefu', 'url'=>array('admin')),
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