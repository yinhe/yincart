<?php
$this->breadcrumbs=array(
	'菜单'=>array('admin'),
	'管理',
);

$this->menu=array(
	array('label'=>'创建菜单', 'url'=>array('create')),
);
?>

<h1>后台菜单</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'adminmenu-grid',
	'dataProvider'=>$model->AdminMenuSearch(),
	'filter'=>$model,
	'columns'=>array(
//		'menu_id',
		'parent_id',
		'name',
		'en_name',
		'menu_url',
		'sort_order',
                'type',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<h1>前台主目录菜单</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'middlemenu-grid',
	'dataProvider'=>$model->MainMenuSearch(),
	'filter'=>$model,
	'columns'=>array(
//		'menu_id',
		'parent_id',
		'name',
		'en_name',
		'menu_url',
		'sort_order',
                'type',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<h1>前台底部菜单</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bottommenu-grid',
	'dataProvider'=>$model->BottomMenuSearch(),
	'filter'=>$model,
	'columns'=>array(
//		'menu_id',
		'parent_id',
		'name',
		'en_name',
		'menu_url',
		'sort_order',
                'type',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>