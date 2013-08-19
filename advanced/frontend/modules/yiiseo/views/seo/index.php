<?php
$this->breadcrumbs=array(
	'Yiiseo Urls'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List YiiseoUrl', 'url'=>array('index')),
	array('label'=>'Create YiiseoUrl', 'url'=>array('create')),
	array('label'=>'Logout', 'url'=>Yii::app()->createUrl("yiiseo/default/logout")),
);

?>

<h1>Manage Yiiseo Urls</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'yiiseo-url-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'url',
		'language',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
