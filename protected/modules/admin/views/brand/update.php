<?php
$this->breadcrumbs=array(
	'Brands'=>array('index'),
	$model->value_id=>array('view','id'=>$model->value_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Brand', 'url'=>array('index')),
	array('label'=>'Create Brand', 'url'=>array('create')),
	array('label'=>'View Brand', 'url'=>array('view', 'id'=>$model->value_id)),
	array('label'=>'Manage Brand', 'url'=>array('admin')),
);
?>

<h1>Update Brand <?php echo $model->value_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>