<?php
$this->breadcrumbs=array(
	'Work'=>array('list'),
	$model->title=>array('view','id'=>$model->item_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'Create Work','icon'=>'plus','url'=>array('create')),
	array('label'=>'View Work','icon'=>'eye-open','url'=>array('view','id'=>$model->item_id)),
	array('label'=>'Manage Work','icon'=>'cog','url'=>array('list')),
	);
	?>

	<h1>Update Work <?php echo $model->item_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>