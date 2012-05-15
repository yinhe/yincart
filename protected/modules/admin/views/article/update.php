<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title=>array('view','id'=>$model->article_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Article', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'View Article', 'url'=>array('view', 'id'=>$model->article_id)),
	array('label'=>'Manage Article', 'url'=>array('admin')),
);
?>

<div class="box">
<div class="box-title2">Update Article <?php echo $model->article_id; ?></div>
<div class="box-content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>