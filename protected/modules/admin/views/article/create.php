<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Article', 'url'=>array('index')),
	array('label'=>'Manage Article', 'url'=>array('admin')),
);
?>

<div class="box">
<div class="box-title2">Create Article</div>
<div class="box-content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>