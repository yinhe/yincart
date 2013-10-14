<?php
/* @var $this StoreCategory1Controller */
/* @var $model StoreCategory */

$this->breadcrumbs=array(
	'Store Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StoreCategory', 'url'=>array('index')),
	array('label'=>'Manage StoreCategory', 'url'=>array('admin')),
);
?>

<h1>Create StoreCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>