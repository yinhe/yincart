<?php

$this->tabs = array(
	 array('label'=>t('Manage'), 'url'=> $this->createUrl("admin", array("menu_id" => $model->menu_id))),
	array('label'=>t('Update'), 'url'=> $this->createUrl('update', array('id'=>$model->id)),'active'=>true),
	array('label'=>t('View'), 'url'=> $this->createUrl('view', array('id'=>$model->id))),
	array('label'=>t('Create'), 'url'=>$this->createUrl('create')),	
);

echo $form;
