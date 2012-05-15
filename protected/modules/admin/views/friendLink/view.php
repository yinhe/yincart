<?php
$this->breadcrumbs=array(
	'Friend Links'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FriendLink', 'url'=>array('index')),
	array('label'=>'Create FriendLink', 'url'=>array('create')),
	array('label'=>'Update FriendLink', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FriendLink', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FriendLink', 'url'=>array('admin')),
);
?>

<h1>View FriendLink #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'website',
		'sort_order',
	),
)); ?>
