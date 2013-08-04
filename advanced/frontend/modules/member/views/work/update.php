<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->title=>array('view','id'=>$model->item_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Item','icon'=>'list','url'=>array('index')),
	array('label'=>'Create Item','icon'=>'plus','url'=>array('create')),
	array('label'=>'View Item','icon'=>'eye-open','url'=>array('view','id'=>$model->item_id)),
	array('label'=>'Manage Item','icon'=>'cog','url'=>array('admin')),
	);
	?>

	<h1>Update Item <?php echo $model->item_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>