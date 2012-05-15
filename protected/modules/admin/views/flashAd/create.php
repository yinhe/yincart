<?php
$this->breadcrumbs=array(
	'Flash Ads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FlashAd', 'url'=>array('index')),
	array('label'=>'Manage FlashAd', 'url'=>array('admin')),
);
?>

<div class="box">
<div class="box-title2">Create FlashAd</div>
<div class="box-content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>