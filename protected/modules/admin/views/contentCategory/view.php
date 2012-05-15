<?php
$this->breadcrumbs=array(
	'内容分类'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'创建内容分类', 'url'=>array('create')),
	array('label'=>'更新内容分类', 'url'=>array('update', 'id'=>$model->category_id)),
	array('label'=>'删除内容分类', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->category_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理内容分类', 'url'=>array('admin')),
);
?>

<h1>查看内容分类 #<?php echo $model->category_id; ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'category_id',
		'parent_id',
		'category_name',
	),
)); ?>