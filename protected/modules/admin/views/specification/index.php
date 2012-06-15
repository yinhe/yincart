<?php
$this->breadcrumbs=array(
	'Specifications',
);

$this->menu=array(
	array('label'=>'Create Specification', 'url'=>array('create')),
	array('label'=>'Manage Specification', 'url'=>array('admin')),
);
?>

<h1>Specifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
