<?php
$this->breadcrumbs=array(
	'Items',
);

$this->menu=array(
array('label'=>'Create Item','icon'=>'plus','url'=>array('create')),
array('label'=>'Manage Item','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Items</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
