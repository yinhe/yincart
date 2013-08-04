<?php
/* @var $this ProfileController */

$this->breadcrumbs=array(
	'Profile',
);
?>

<?php 

    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => '个人资料',
    'headerIcon' => 'icon-home',
    'content' => $this->renderPartial('_view', array('email'=>$email, 'username'=>$username))
    ));
?>