<?php
$this->breadcrumbs=array(
	'Ad Positions',
);

$this->menu=array(
	array('label'=>'Create AdPosition', 'url'=>array('create')),
	array('label'=>'Manage AdPosition', 'url'=>array('admin')),
);
?>

<h1>Ad Positions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
