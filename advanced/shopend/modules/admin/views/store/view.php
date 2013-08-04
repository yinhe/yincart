<?php
/* @var $this StoreController */
/* @var $model Store */
?>

<?php
$this->breadcrumbs=array(
	'Stores'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Store', 'url'=>array('index')),
	array('label'=>'Create Store', 'url'=>array('create')),
	array('label'=>'Update Store', 'url'=>array('update', 'id'=>$model->store_id)),
	array('label'=>'Delete Store', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->store_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Store', 'url'=>array('admin')),
);
?>

<h1>View Store #<?php echo $model->store_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'store_id',
		'user_id',
		'name',
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