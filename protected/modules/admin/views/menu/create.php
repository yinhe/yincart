<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Menu', 'url'=>array('index')),
	array('label'=>'Manage Menu', 'url'=>array('admin')),
);
?>

<h1>Create Menu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>