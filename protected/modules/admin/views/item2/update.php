<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->item_id=>array('view','id'=>$model->item_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Item', 'url'=>array('index')),
	array('label'=>'Create Item', 'url'=>array('create')),
	array('label'=>'View Item', 'url'=>array('view', 'id'=>$model->item_id)),
	array('label'=>'Manage Item', 'url'=>array('admin')),
);
?>

<h1>Update Item <?php echo $model->item_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>