<?php
$this->breadcrumbs=array(
	'商品分类'=>array('admin'),
	'创建',
);

$this->menu=array(
	array('label'=>'管理分类', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>Create Category</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>