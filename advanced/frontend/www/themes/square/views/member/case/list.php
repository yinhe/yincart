<?php
$this->breadcrumbs=array(
	'Anlis'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'创建案例', 'icon'=>'plus', 'url'=>array('create')),
);
?>

<h3>案例列表</h3>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'anli-grid',
	'dataProvider'=>$model->ownerSearch(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
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
