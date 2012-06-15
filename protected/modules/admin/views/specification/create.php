<?php
$this->breadcrumbs=array(
	'Specifications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Specification', 'url'=>array('index')),
	array('label'=>'Manage Specification', 'url'=>array('admin')),
);
?>

<h1>Create Specification</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>