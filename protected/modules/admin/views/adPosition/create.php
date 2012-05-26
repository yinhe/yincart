<?php
$this->breadcrumbs=array(
	'广告位置'=>array('admin'),
	'创建',
);

$this->menu=array(
	array('label'=>'管理广告位置', 'url'=>array('admin')),
);
?>

<h1>创建广告位置</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>