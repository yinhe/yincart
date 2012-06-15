<?php
$this->breadcrumbs=array(
	'Order Logs',
);

$this->menu=array(
	array('label'=>'Create OrderLog', 'url'=>array('create')),
	array('label'=>'Manage OrderLog', 'url'=>array('admin')),
);
?>

<h1>Order Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
