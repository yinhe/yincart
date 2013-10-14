<?php
/* @var $this StoreCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Store Categories',
);

$this->menu=array(
	array('label'=>'Create StoreCategory', 'url'=>array('create')),
	array('label'=>'Manage StoreCategory', 'url'=>array('admin')),
);
?>

<h1>Store Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
