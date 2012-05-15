<?php
$this->breadcrumbs=array(
	'案例'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'创建案例', 'url'=>array('create')),
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'anli-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'url',
		'keyword',
                'sort_order',
		/*
		'detail',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template' => '{update}{delete}'
		),
	),
)); ?>
