<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id=>array('view','id'=>$model->order_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Orders', 'url'=>array('index')),
	array('label'=>'Create Orders', 'url'=>array('create')),
	array('label'=>'View Orders', 'url'=>array('view', 'id'=>$model->order_id)),
	array('label'=>'Manage Orders', 'url'=>array('admin')),
);
?>

<h1>Update Orders <?php echo $model->order_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>