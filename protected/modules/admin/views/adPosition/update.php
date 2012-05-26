<?php
$this->breadcrumbs=array(
	'广告位置'=>array('admin'),
	$model->position_id=>array('view','id'=>$model->position_id),
	'更新',
);

$this->menu=array(
	array('label'=>'创建广告位置', 'url'=>array('create')),
	array('label'=>'查看广告位置', 'url'=>array('view', 'id'=>$model->position_id)),
	array('label'=>'管理广告位置', 'url'=>array('admin')),
);
?>

<h1>更新广告位置 <?php echo $model->position_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>