<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Posts',
);

$this->menu=array(
	array('label'=>'Create Post', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'Manage Post', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>Posts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>