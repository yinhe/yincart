<?php
$this->breadcrumbs=array(
	'Orders',
);

$this->menu=array(
	array('label'=>'Create Orders', 'url'=>array('create')),
	array('label'=>'Manage Orders', 'url'=>array('admin')),
);
?>

<h1>Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
