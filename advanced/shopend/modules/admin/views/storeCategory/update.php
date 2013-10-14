<?php
/* @var $this StoreCategoryController */
/* @var $model StoreCategory */

$this->breadcrumbs=array(
	'店铺分类'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'创建分类', 'url'=>array('create'), 'icon'=>'plus'),
	array('label'=>'查看分类', 'url'=>array('view', 'id'=>$model->id), 'icon'=>'eye-open'),
	array('label'=>'管理分类', 'url'=>array('admin'), 'icon'=>'cog'),
);
?>

<h1>Update StoreCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>