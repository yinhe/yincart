<?php
/* @var $this StoreCategory1Controller */
/* @var $model StoreCategory */

$this->breadcrumbs=array(
	'Store Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List StoreCategory', 'url'=>array('index')),
	array('label'=>'Create StoreCategory', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#store-category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Store Categories</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'store-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'store_id',
		'root',
		'lft',
		'rgt',
		'level',
		/*
		'name',
		'label',
		'url',
		'pic',
		'position',
		'if_show',
		'memo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
