<?php
$this->breadcrumbs=array(
	'Articles',
);

$this->menu=array(
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Manage Article', 'url'=>array('admin')),
);
?>

<h1>Articles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
