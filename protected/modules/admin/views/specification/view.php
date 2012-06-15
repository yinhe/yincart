<?php
$this->breadcrumbs=array(
	'Specifications'=>array('index'),
	$model->spec_id,
);

$this->menu=array(
	array('label'=>'List Specification', 'url'=>array('index')),
	array('label'=>'Create Specification', 'url'=>array('create')),
	array('label'=>'Update Specification', 'url'=>array('update', 'id'=>$model->spec_id)),
	array('label'=>'Delete Specification', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->spec_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Specification', 'url'=>array('admin')),
);
?>

<h1>View Specification #<?php echo $model->spec_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'spec_id',
		'spec_name',
		'spec_show_type',
		'spec_type',
		'spec_memo',
	),
)); ?>
