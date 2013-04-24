<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'文章创建', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'文章更新', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->article_id)),
	array('label'=>'文章删除', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->article_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'文章管理', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View Article #<?php echo $model->article_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'article_id',
		'category_id',
		'author_id',
		'title',
		'from',
		'content:html',
		'views',
		'create_time',
		'update_time',
	),
)); ?>
