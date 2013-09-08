<?php
$this->breadcrumbs=array(
	'商家分店列表'=>array('shop/index'),
	'修改商家分店',
);
?>

<h1>修改商家分店</h1>

<?php

echo $this->renderPartial('_form', array(
    'model'=>$model,
    )); 
?>