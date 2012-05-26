<?php
$this->breadcrumbs=array(
	'Ad Positions'=>array('index'),
	$model->position_id,
);

$this->menu=array(
	array('label'=>'List AdPosition', 'url'=>array('index')),
	array('label'=>'Create AdPosition', 'url'=>array('create')),
	array('label'=>'Update AdPosition', 'url'=>array('update', 'id'=>$model->position_id)),
	array('label'=>'Delete AdPosition', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->position_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdPosition', 'url'=>array('admin')),
);
?>

<h1>View AdPosition #<?php echo $model->position_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'position_id',
		'position_name',
		'ad_width',
		'ad_height',
		'position_desc',
		'position_style',
	),
)); ?>
