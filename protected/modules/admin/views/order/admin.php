<?php
$this->breadcrumbs=array(
	'订单'=>array('index'),
	'管理',
);

$this->menu=array(
        array('label'=>'订单列表', 'url'=>array('index')),
	array('label'=>'上传商家订单', 'url'=>array('create')),
);
?>

<h1>订单管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'orders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'order_id',
		'order_sn',
		'user_id',
		'user_name',
		'email',
		'address',
		/*
		'postcode',
		'tel_no',
		'content',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>