<?php
$this->breadcrumbs=array(
	'Stores'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Store','icon'=>'list','url'=>array('index')),
array('label'=>'Manage Store','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Create Store</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>