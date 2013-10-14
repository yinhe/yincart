<?php
$this->breadcrumbs=array(
	'商品分类'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'创建分类','icon'=>'plus','url'=>array('create')),
	array('label'=>'查看分类','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'管理分类','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update Category <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>