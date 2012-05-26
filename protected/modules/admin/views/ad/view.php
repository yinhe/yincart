<?php
$this->breadcrumbs=array(
	'Ads'=>array('index'),
	$model->ad_id,
);

$this->menu=array(
	array('label'=>'List Ad', 'url'=>array('index')),
	array('label'=>'Create Ad', 'url'=>array('create')),
	array('label'=>'Update Ad', 'url'=>array('update', 'id'=>$model->ad_id)),
	array('label'=>'Delete Ad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ad_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ad', 'url'=>array('admin')),
);
?>

<h1>View Ad #<?php echo $model->ad_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ad_id',
		'position_id',
		'media_type',
		'ad_name',
		'ad_link',
		'ad_code',
		'start_time',
		'end_time',
		'link_man',
		'link_email',
		'link_phone',
		'click_count',
		'enabled',
	),
)); ?>
