<?php
$this->breadcrumbs=array(
	'Shippings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Shipping', 'url'=>array('index')),
	array('label'=>'Manage Shipping', 'url'=>array('admin')),
);
?>

<h1>Create Shipping</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>