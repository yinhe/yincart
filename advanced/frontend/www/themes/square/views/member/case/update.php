<?php
$this->breadcrumbs=array(
	'案例'=>array('list'),
	$model->title=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'创建案例','icon'=>'plus','url'=>array('create')),
	array('label'=>'查看案例','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'案例列表','icon'=>'list','url'=>array('list')),
);
?>

<h1>更新案例 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>