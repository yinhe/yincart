<?php
$this->breadcrumbs=array(
	'Stores',
);

$this->menu=array(
array('label'=>'Create Store','icon'=>'plus','url'=>array('create')),
array('label'=>'Manage Store','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Stores</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
