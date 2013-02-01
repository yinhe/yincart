<?php
$this->breadcrumbs=array(
	'Flash Ads',
);

$this->menu=array(
	array('label'=>'Create FlashAd', 'url'=>array('create')),
	array('label'=>'Manage FlashAd', 'url'=>array('admin')),
);
?>

<h1>Flash Ads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
