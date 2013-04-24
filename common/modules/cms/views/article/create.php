<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Create',
);

$action_text = '创建文章';

$this->menu=array(
	array('label'=>'文章管理', 'icon'=>'cog','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'action_text'=>$action_text)); ?>