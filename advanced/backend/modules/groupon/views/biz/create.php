<?php
$this->breadcrumbs=array(
	'商家列表'=>array('biz/index'),
	'添加商家',
);
?>

<h1>添加商家</h1>

<?php

echo $this->renderPartial('_form', array(
    'model'=>$model,
    )); 
?>

