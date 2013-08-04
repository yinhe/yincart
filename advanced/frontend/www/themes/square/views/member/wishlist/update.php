<?php
$this->breadcrumbs=array(
	'我的收藏'=>array('admin'),
	$model->wishlist_id=>array('view','id'=>$model->wishlist_id),
	'更新',
);
?>

<h3>更新备注<?php echo $model->wishlist_id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>