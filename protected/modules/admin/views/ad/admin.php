<?php
$this->breadcrumbs=array(
	'广告列表'=>array('admin'),
	'管理',
);

$this->menu=array(
	array('label'=>'创建广告', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ad-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>广告列表</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ad_id',
		'position_id',
		'media_type',
		'ad_name',
		'ad_link',
//		'ad_code',
		/*
		'start_time',
		'end_time',
		'link_man',
		'link_email',
		'link_phone',
		'click_count',
		'enabled',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
