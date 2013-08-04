<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Item','icon'=>'list','url'=>array('index')),
array('label'=>'Manage Item','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Create Item</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>