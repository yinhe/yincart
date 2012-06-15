<?php
$this->breadcrumbs=array(
	'Payment Methods'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PaymentMethod', 'url'=>array('index')),
	array('label'=>'Create PaymentMethod', 'url'=>array('create')),
);
?>

<h1>支付方式</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'payment-method-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
//		'code',
		'name',
		'desc',
//		'config',
		'enabled',
		/*
		'is_cod',
		'is_online',
		'sort_order',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
