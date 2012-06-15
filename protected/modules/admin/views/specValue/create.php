<?php
$this->breadcrumbs=array(
	'Spec Values'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SpecValue', 'url'=>array('index')),
	array('label'=>'Manage SpecValue', 'url'=>array('admin')),
);
?>

<h1>Create SpecValue</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>