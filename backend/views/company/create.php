<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Company', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage Company', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Create Company</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>