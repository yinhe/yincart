<?php
$this->breadcrumbs=array(
	'Pinpais'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pinpai', 'url'=>array('index')),
	array('label'=>'Manage Pinpai', 'url'=>array('admin')),
);
?>

<h1>Create Pinpai</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>