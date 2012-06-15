<?php
$this->breadcrumbs=array(
	'Payment Methods'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PaymentMethod', 'url'=>array('index')),
	array('label'=>'Create PaymentMethod', 'url'=>array('create')),
	array('label'=>'View PaymentMethod', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PaymentMethod', 'url'=>array('admin')),
);
?>

<h1>Update PaymentMethod <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>