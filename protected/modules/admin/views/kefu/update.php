<?php
$this->breadcrumbs=array(
	'Kefus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kefu', 'url'=>array('index')),
	array('label'=>'Create Kefu', 'url'=>array('create')),
	array('label'=>'View Kefu', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Kefu', 'url'=>array('admin')),
);
?>

<div class="box">
<div class="box-title2">Update Kefu <?php echo $model->id; ?></div>
<div class="box-content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>