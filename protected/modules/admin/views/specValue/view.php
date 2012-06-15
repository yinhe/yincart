<?php
$this->breadcrumbs=array(
	'Spec Values'=>array('index'),
	$model->spec_value_id,
);

$this->menu=array(
	array('label'=>'List SpecValue', 'url'=>array('index')),
	array('label'=>'Create SpecValue', 'url'=>array('create')),
	array('label'=>'Update SpecValue', 'url'=>array('update', 'id'=>$model->spec_value_id)),
	array('label'=>'Delete SpecValue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->spec_value_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SpecValue', 'url'=>array('admin')),
);
?>

<h1>View SpecValue #<?php echo $model->spec_value_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'spec_value_id',
		'spec_id',
		'spec_value',
		'spec_image',
		'sort_order',
	),
)); ?>
