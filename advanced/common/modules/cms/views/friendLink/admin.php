<?php
$this->breadcrumbs = array(
    '友情链接' => array('admin'),
    '管理',
);

$this->menu = array(
    array('label' => '创建链接', 'icon' => 'plus', 'url' => array('create')),
);
?>

<h1>管理友情链接</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'friend-link-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
	'link_id',
	'category.name',
	'title',
	'pic',
	'url',
//	'memo',
	'sort_order',
	'language',
	/*
	  'language',
	  'create_time',
	  'update_time',
	 */
	array(
	    'class' => 'bootstrap.widgets.TbButtonColumn',
	),
    ),
));
?>
