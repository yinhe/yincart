<?php
$this->breadcrumbs=array(
	'合同列表'=>array('contract/index','biz_id'=>$biz->id),
	'添加合同',
);
?>

<h1>添加商家<?php echo $biz->title?>的合同</h1>

<?php

echo $this->renderPartial('_form', array(
    'model'=>$model,
    'upload'=>$upload,
    )); 
?>
