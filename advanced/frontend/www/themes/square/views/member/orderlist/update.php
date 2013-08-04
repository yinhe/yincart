<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id=>array('view','id'=>$model->order_id),
	'Update',
);

$this->menu=array(
	array('label'=>'View Order', 'url'=>array('view', 'id'=>$model->order_id)),
	array('label'=>'Manage Order', 'url'=>array('list')),
);
?>

<h1>Update Order <?php echo $model->order_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>