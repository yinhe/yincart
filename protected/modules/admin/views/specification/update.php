<?php
$this->breadcrumbs=array(
	'Specifications'=>array('index'),
	$model->spec_id=>array('view','id'=>$model->spec_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Specification', 'url'=>array('index')),
	array('label'=>'Create Specification', 'url'=>array('create')),
	array('label'=>'View Specification', 'url'=>array('view', 'id'=>$model->spec_id)),
	array('label'=>'Manage Specification', 'url'=>array('admin')),
);
?>

<h1>Update Specification <?php echo $model->spec_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>