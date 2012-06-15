<?php
$this->breadcrumbs=array(
	'Shipping Methods'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ShippingMethod', 'url'=>array('index')),
	array('label'=>'Create ShippingMethod', 'url'=>array('create')),
	array('label'=>'View ShippingMethod', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ShippingMethod', 'url'=>array('admin')),
);
?>

<h1>Update ShippingMethod <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>