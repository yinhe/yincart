<?php
$this->breadcrumbs=array(
	'Anlis'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'创建案例', 'icon'=>'plus', 'url'=>array('create')),
);
?>

<h1>管理案例</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'anli-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category.name',
		'title',
//		'pic',
		'url',
		'keyword',
		/*
		'detail',
		'sort_order',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
