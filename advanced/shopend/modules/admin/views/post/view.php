<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Post', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Post', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'Update Post', 'icon'=>'pencil', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Post', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Post', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>View Post #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'store_id',
		'category_id',
		'title',
		'url',
		'source',
		'summary',
		'content',
		'tags',
		'status',
		'views',
		'create_time',
		'update_time',
		'author',
		'user_id',
		'language',
	),
)); ?>