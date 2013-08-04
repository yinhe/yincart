<?php
$this->breadcrumbs=array(
	'案例'=>array('list'),
	$model->title,
);

$this->menu=array(
	array('label'=>'创建案例','icon'=>'plus','url'=>array('create')),
	array('label'=>'更新案例','icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'删除案例','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'案例列表','icon'=>'cog','url'=>array('list')),
);
?>

<h1>查看案例 #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'title',
		'pic',
		'url',
		'keyword',
		'detail',
		'sort_order',
		'create_time',
		'update_time',
	),
)); ?>
