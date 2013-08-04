<?php
$this->breadcrumbs=array(
	'友情链接'=>array('admin'),
	'创建',
);

$this->menu=array(
array('label'=>'管理链接','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>创建链接</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>