<?php
/* @var $this StoreController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Stores',
);

$this->menu=array(
	array('label'=>'Create Store','url'=>array('create')),
	array('label'=>'Manage Store','url'=>array('admin')),
);
?>

<h1>Stores</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>