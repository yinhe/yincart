<?php
$this->breadcrumbs=array(
	'广告列表'=>array('admin'),
	$model->ad_id=>array('view','id'=>$model->ad_id),
	'更新',
);

$this->menu=array(
	array('label'=>'创建广告', 'url'=>array('create')),
	array('label'=>'查看广告', 'url'=>array('view', 'id'=>$model->ad_id)),
	array('label'=>'管理广告', 'url'=>array('admin')),
);
?>

<h1>更新广告 <?php echo $model->ad_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>