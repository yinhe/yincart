<?php
/* @var $this StoreCategory1Controller */
/* @var $model StoreCategory */

$this->breadcrumbs=array(
	'Store Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StoreCategory', 'url'=>array('index')),
	array('label'=>'Create StoreCategory', 'url'=>array('create')),
	array('label'=>'View StoreCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StoreCategory', 'url'=>array('admin')),
);
?>

<h1>Update StoreCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>