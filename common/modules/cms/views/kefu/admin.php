<?php
$this->breadcrumbs=array(
	'客服'=>array('admin'),
	'管理',
);

$this->menu=array(
	array('label'=>'创建客服', 'icon'=>'plus','url'=>array('create')),
);
?>

<h1>客服管理</h1>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'kefu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'type',
		'nick_name',
		'account',
		'if_show',
		'sort_order',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>