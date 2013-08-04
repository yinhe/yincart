<?php
$this->breadcrumbs = array(
    '友情链接' => array('admin'),
    $model->title,
);

$this->menu = array(
    array('label' => '创建链接', 'icon' => 'plus', 'url' => array('create')),
    array('label' => '更新链接', 'icon' => 'pencil', 'url' => array('update', 'id' => $model->link_id)),
    array('label' => '删除链接', 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->link_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => '管理链接', 'icon' => 'cog', 'url' => array('admin')),
);
?>

<h1>查看链接 #<?php echo $model->link_id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
	'link_id',
	'title',
	'pic',
	'url',
	'memo',
	'sort_order',
	'language',
	'create_time',
	'update_time',
    ),
));
?>
