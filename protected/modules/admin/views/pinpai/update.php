<?php
$this->breadcrumbs=array(
	'Pinpais'=>array('index'),
	$model->pp_id=>array('view','id'=>$model->pp_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pinpai', 'url'=>array('index')),
	array('label'=>'Create Pinpai', 'url'=>array('create')),
	array('label'=>'View Pinpai', 'url'=>array('view', 'id'=>$model->pp_id)),
	array('label'=>'Manage Pinpai', 'url'=>array('admin')),
);
?>

<h1>Update Pinpai <?php echo $model->pp_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>