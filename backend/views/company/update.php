<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->com_id=>array('view','id'=>$model->com_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Company', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Company', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'View Company', 'url'=>array('view', 'id'=>$model->com_id)),
	array('label'=>'Manage Company', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update Company <?php echo $model->com_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>