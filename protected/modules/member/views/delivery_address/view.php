<?php
$this->breadcrumbs=array(
	'Address Results'=>array('index'),
	$model->contact_id,
);

$this->menu=array(
	array('label'=>'List AddressResult', 'url'=>array('index')),
	array('label'=>'Create AddressResult', 'url'=>array('create')),
	array('label'=>'Update AddressResult', 'url'=>array('update', 'id'=>$model->contact_id)),
	array('label'=>'Delete AddressResult', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->contact_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AddressResult', 'url'=>array('admin')),
);
?>

<h1>View AddressResult #<?php echo $model->contact_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'contact_id',
		'user_id',
		'contact_name',
		'country',
		'state',
		'city',
		'district',
		'zipcode',
		'address',
		'phone',
		'mobile_phone',
		'memo',
		'is_default',
		'create_time',
		'update_time',
	),
)); ?>
