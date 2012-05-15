<?php
$this->breadcrumbs=array(
	'Flash Ads'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List FlashAd', 'url'=>array('index')),
	array('label'=>'Create FlashAd', 'url'=>array('create')),
	array('label'=>'Update FlashAd', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FlashAd', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FlashAd', 'url'=>array('admin')),
);
?>

<div class="box">
<div class="box-title2">View FlashAd #<?php echo $model->id; ?></div>
<div class="box-content">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'pic',
		'url',
		'sort_order',
	),
)); ?>
</div>
</div>