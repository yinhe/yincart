<?php
$this->breadcrumbs=array(
	'菜单'=>array('admin'),
	'管理',
);

$this->menu=array(
	array('label'=>'创建菜单', 'icon'=>'plus','url'=>array('create')),
);
?>

<h3>后台菜单</h3>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
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
                array(
                    'name' => 'type',
                    'value' => '$data->getType()',
                ),   
                array(
                    'name' => 'is_show',
                    'value' => '$data->getShow()',
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
<h3>前台主目录菜单</h3>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
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
                array(
                    'name' => 'type',
                    'value' => '$data->getType()',
                ),   
                array(
                    'name' => 'is_show',
                    'value' => '$data->getShow()',
                ), 
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
<h3>前台底部菜单</h3>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
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
                array(
                    'name' => 'type',
                    'value' => '$data->getType()',
                ),    
                array(
                    'name' => 'is_show',
                    'value' => '$data->getShow()',
                ),    
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>