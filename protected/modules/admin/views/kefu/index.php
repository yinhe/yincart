<?php
$this->breadcrumbs=array(
	'Kefus',
);

$this->menu=array(
	array('label'=>'Create Kefu', 'url'=>array('create')),
	array('label'=>'Manage Kefu', 'url'=>array('admin')),
);
?>

<h1>Kefus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
