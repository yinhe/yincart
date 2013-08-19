<?php
$this->breadcrumbs=array(
	'Item Types'=>array('index'),
	$model->name=>array('view','id'=>$model->type_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ItemType','icon'=>'list','url'=>array('index')),
	array('label'=>'Create ItemType','icon'=>'plus','url'=>array('create')),
	array('label'=>'View ItemType','icon'=>'eye-open','url'=>array('view','id'=>$model->type_id)),
	array('label'=>'Manage ItemType','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update ItemType <?php echo $model->type_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>