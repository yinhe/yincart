<?php
$this->breadcrumbs=array(
	'Companies',
);

$this->menu=array(
	array('label'=>'Create Company', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage Company', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Companies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
