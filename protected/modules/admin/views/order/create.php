<?php
$this->breadcrumbs=array(
	'订单'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'订单列表', 'url'=>array('index')),
	array('label'=>'管理订单', 'url'=>array('admin')),
);
?>

<h1>创建订单</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>