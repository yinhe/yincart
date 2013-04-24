<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title=>array('view','id'=>$model->article_id),
	'Update',
);

$action_text = '更新文章' . $model->article_id;

$this->menu=array(
	array('label'=>'创建文章', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'查看文章', 'icon'=>'eye-open','url'=>array('view', 'id'=>$model->article_id)),
	array('label'=>'文章管理', 'icon'=>'cog','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'action_text'=>$action_text)); ?>
