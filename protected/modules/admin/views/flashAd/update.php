<?php
$this->breadcrumbs=array(
	'Flash Ads'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FlashAd', 'url'=>array('index')),
	array('label'=>'Create FlashAd', 'url'=>array('create')),
	array('label'=>'View FlashAd', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FlashAd', 'url'=>array('admin')),
);
?>

<div class="box">
<div class="box-title2">Update FlashAd <?php echo $model->id; ?></div>
<div class="box-content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>