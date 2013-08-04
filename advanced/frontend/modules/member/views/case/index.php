<?php
$this->breadcrumbs=array(
	'Anlis',
);

$this->menu=array(
	array('label'=>'Create Anli','icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage Anli','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Anlis</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
