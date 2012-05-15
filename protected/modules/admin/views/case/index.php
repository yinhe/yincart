<?php
$this->breadcrumbs=array(
	'Anlis',
);

$this->menu=array(
	array('label'=>'Create anli', 'url'=>array('create')),
	array('label'=>'Manage anli', 'url'=>array('admin')),
);
?>

<h1>Anlis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
