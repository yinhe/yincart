<?php
$this->breadcrumbs=array(
	'Friend Links',
);

$this->menu=array(
	array('label'=>'Create FriendLink', 'url'=>array('create')),
	array('label'=>'Manage FriendLink', 'url'=>array('admin')),
);
?>

<h1>Friend Links</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
