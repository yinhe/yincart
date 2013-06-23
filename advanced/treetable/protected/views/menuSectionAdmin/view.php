<?php
$this->tabs = array(
    array('label'=>t('Manage'), 'url'=> $this->createUrl('admin', array("menu_id" => $menu->id))),
	array('label'=>t('Update'), 'url'=> $this->createUrl('update', array('id'=>$model->id))),
	array('label'=>t('View'), 'url'=> $this->createUrl('view', array('id'=>$model->id)),'active'=>true),
	array('label'=>t('Create'), 'url'=>$this->createUrl('create')),
);

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
	
	'attributes'=>array(
		'id',
		'page_id',
		'menu_id',		
		'title',
		'url',
		'module_url',
		'module_id',
		'is_published',
	),
)); ?>
