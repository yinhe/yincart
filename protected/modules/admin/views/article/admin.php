<?php
$this->breadcrumbs=array(
	'文章'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'创建文章', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('article-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理文章</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'article_id',
		'category.category_name',
		'author.username',
		'title',
		'from',
                'language',
		/*
		'views',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>