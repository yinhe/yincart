<?php
$this->breadcrumbs=array(
	'Anlis'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'创建案例','icon'=>'plus','url'=>array('create')),
	array('label'=>'查看案例','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'管理案例','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>更新案例 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>