<?php
$this->breadcrumbs=array(
	'订单',
);

$this->menu=array(
	array('label'=>'上传商家订单', 'url'=>array('create')),
	array('label'=>'管理订单', 'url'=>array('admin')),
);
?>

<h1>订单列表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
