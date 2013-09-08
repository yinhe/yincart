<?php
$this->breadcrumbs=array(
	'商家列表'=>array('biz/index'),
	'修改商家',
);
?>

<h1>修改商家</h1>

<?php

echo $this->renderPartial('_form', array(
    'model'=>$model,
    )); 
?>

