<?php
$this->breadcrumbs=array(
	'Pinpais'=>array('index'),
	$model->pp_id,
);

$this->menu=array(
	array('label'=>'List Pinpai', 'url'=>array('index')),
	array('label'=>'Create Pinpai', 'url'=>array('create')),
	array('label'=>'Update Pinpai', 'url'=>array('update', 'id'=>$model->pp_id)),
	array('label'=>'Delete Pinpai', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pinpai', 'url'=>array('admin')),
);
?>

<h1>View Pinpai #<?php echo $model->pp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pp_id',
		'pp_name',
		'sort_order',
	),
)); ?>
