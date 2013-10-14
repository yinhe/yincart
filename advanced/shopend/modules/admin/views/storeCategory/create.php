<?php
/* @var $this StoreCategoryController */
/* @var $model StoreCategory */

$this->breadcrumbs=array(
	'店铺分类'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'分类管理', 'url'=>array('admin'), 'icon'=>'cog'),
);
?>

<h1>Create StoreCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>