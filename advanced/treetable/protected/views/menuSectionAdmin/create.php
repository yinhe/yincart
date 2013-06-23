<?php


$this->tabs = array(
	array('label'=>t('Manage'), 'url'=>$this->createUrl('admin', array("menu_id" => $menu->id))),	 
	array('label'=>t('Create'), 'url'=>$this->createUrl('create'),'active'=>true),
   
);

echo $form;
