<?php
$this->breadcrumbs=array(
	'商家分店列表'=>array('shop/index'),
	'添加商家分店',
);
?>

<h1>添加商家<?php echo $biz->title?>的分店</h1>

<?php

echo $this->renderPartial('_form', array(
    'model'=>$model,
    )); 
?>