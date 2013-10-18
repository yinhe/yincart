<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Post', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Post', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'View Post', 'icon'=>'eye-open', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Post', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

    <h1>Update Post <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>