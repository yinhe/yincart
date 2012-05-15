<?php
$this->breadcrumbs=array(
	'Pinpais',
);

$this->menu=array(
	array('label'=>'Create Pinpai', 'url'=>array('create')),
	array('label'=>'Manage Pinpai', 'url'=>array('admin')),
);
?>

<h1>Pinpais</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
