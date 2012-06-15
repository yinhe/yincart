<?php
$this->breadcrumbs=array(
	'Item Props',
);

$this->menu=array(
	array('label'=>'Create ItemProp', 'url'=>array('create')),
	array('label'=>'Manage ItemProp', 'url'=>array('admin')),
);
?>

<h1>Item Props</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
