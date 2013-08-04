<?php
$this->breadcrumbs=array(
	'Stores'=>array('index'),
	$model->name=>array('view','id'=>$model->store_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Store','icon'=>'list','url'=>array('index')),
	array('label'=>'Create Store','icon'=>'plus','url'=>array('create')),
	array('label'=>'View Store','icon'=>'eye-open','url'=>array('view','id'=>$model->store_id)),
	array('label'=>'Manage Store','icon'=>'cog','url'=>array('admin')),
	);
	?>

	<h1>Update Store <?php echo $model->store_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>