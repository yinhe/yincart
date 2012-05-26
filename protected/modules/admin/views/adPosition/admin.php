<?php
$this->breadcrumbs=array(
	'广告位置'=>array('admin'),
	'管理',
);

$this->menu=array(
	array('label'=>'创建广告位置', 'url'=>array('create')),
);


?>

<h1>管理广告位置</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ad-position-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'position_id',
		'position_name',
		'ad_width',
		'ad_height',
//		'position_desc',
//		'position_style',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
