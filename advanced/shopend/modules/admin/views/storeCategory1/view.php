<?php
/* @var $this StoreCategory1Controller */
/* @var $model StoreCategory */

$this->breadcrumbs=array(
	'Store Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List StoreCategory', 'url'=>array('index')),
	array('label'=>'Create StoreCategory', 'url'=>array('create')),
	array('label'=>'Update StoreCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StoreCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StoreCategory', 'url'=>array('admin')),
);
?>

<h1>View StoreCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'store_id',
		'root',
		'lft',
		'rgt',
		'level',
		'name',
		'label',
		'url',
		'pic',
		'position',
		'if_show',
		'memo',
	),
)); ?>
