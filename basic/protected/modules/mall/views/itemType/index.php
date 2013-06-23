<?php
$this->breadcrumbs=array(
	'Item Types',
);

$this->menu=array(
	array('label'=>'Create ItemType','icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage ItemType','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Item Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
