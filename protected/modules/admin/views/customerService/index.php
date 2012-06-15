<?php
$this->breadcrumbs=array(
	'Customer Services',
);

$this->menu=array(
	array('label'=>'Create CustomerService', 'url'=>array('create')),
	array('label'=>'Manage CustomerService', 'url'=>array('admin')),
);
?>

<h1>Customer Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
