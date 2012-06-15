<?php
$this->breadcrumbs=array(
	'Spec Values',
);

$this->menu=array(
	array('label'=>'Create SpecValue', 'url'=>array('create')),
	array('label'=>'Manage SpecValue', 'url'=>array('admin')),
);
?>

<h1>Spec Values</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
