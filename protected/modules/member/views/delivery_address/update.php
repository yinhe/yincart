<?php
$this->breadcrumbs=array(
	'Address Results'=>array('index'),
	$model->contact_id=>array('view','id'=>$model->contact_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AddressResult', 'url'=>array('index')),
	array('label'=>'Create AddressResult', 'url'=>array('create')),
	array('label'=>'View AddressResult', 'url'=>array('view', 'id'=>$model->contact_id)),
	array('label'=>'Manage AddressResult', 'url'=>array('admin')),
);
?>

<h1>Update AddressResult <?php echo $model->contact_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>