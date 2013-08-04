<?php
$this->breadcrumbs=array(
	'Wishlists'=>array('list'),
	'Create',
);

$this->menu=array(
	array('label'=>'收藏列表', 'url'=>array('list')),
);
?>

<h1>Create Wishlist</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>