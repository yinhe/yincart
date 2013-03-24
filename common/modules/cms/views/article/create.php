<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Article', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage Article', 'icon'=>'cog','url'=>array('admin')),
);
?>

<div class="box">
<div class="box-title2">Create Article</div>
<div class="box-content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>