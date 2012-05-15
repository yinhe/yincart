<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Menu', 'url'=>array('index')),
	array('label'=>'Create Menu', 'url'=>array('create')),
	array('label'=>'Update Menu', 'url'=>array('update', 'id'=>$model->menu_id)),
	array('label'=>'Delete Menu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->menu_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Menu', 'url'=>array('admin')),
);
?>

<h1>View Menu #<?php echo $model->menu_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'menu_id',
		'parent_id',
		'name',
		'en_name',
		'menu_url',
                'type',
		'sort_order',
	),
)); ?>
