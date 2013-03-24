<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Company', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Company', 'icon'=>'plus','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('company-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Companies</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'company-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'com_id',
		'com_type',
		'uid',
		'country',
		'province',
		'city',
		/*
		'com_name',
		'com_sn',
		'com_address',
		'com_logo',
		'com_banner',
		'district',
		'com_desc',
		'contactor',
		'office_phone',
		'mobile_phone',
		'status',
		'start_time',
		'end_time',
		'sort',
		'update_time',
		'commision',
		'com_details',
		'email',
		'com_url',
		'add_time',
		'certified_time',
		'tags',
		'brand_story',
		'express',
		'department',
		'employee',
		'industry',
		'nature',
		'com_brands',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
