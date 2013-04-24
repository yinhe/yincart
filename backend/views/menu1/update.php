<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->name=>array('view','id'=>$model->menu_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Menu', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Menu', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'View Menu', 'url'=>array('view', 'id'=>$model->menu_id)),
	array('label'=>'Manage Menu', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update Menu <?php echo $model->menu_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>