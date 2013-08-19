<?php
$this->breadcrumbs=array(
	'Kefus',
);

$this->menu=array(
	array('label'=>'Create Kefu', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage Kefu', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Kefus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
