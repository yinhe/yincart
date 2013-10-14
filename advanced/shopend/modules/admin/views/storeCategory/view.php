<?php
/* @var $this StoreCategoryController */
/* @var $model StoreCategory */

$this->breadcrumbs=array(
	'店铺分类'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'创建分类', 'url'=>array('create'), 'icon'=>'plus'),
	array('label'=>'更新分类', 'url'=>array('update', 'id'=>$model->id), 'icon'=>'pencil'),
	array('label'=>'删除分类', 'url'=>'#', 'icon'=>'trash', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理分类', 'url'=>array('admin'), 'icon'=>'cog'),
);
?>

<h1>View StoreCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'store_id',
		'root',
		'lft',
		'rgt',
		'level',
		'name',
		'label',
		'url',
		'pic',
		'position',
		'if_show',
		'memo',
	),
)); ?>
