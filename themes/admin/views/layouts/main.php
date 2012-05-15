<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fluid_grid.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/text.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tables.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/buttons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title>网站后台管理</title>
</head>

<body>

<div class="container_16" id="page">

	<div id="header">
		<div class="grid_13 alpha"><div class="logo"><?php echo Yii::app()->language == 'zh_cn' ? '网站后台管理' : 'Dashboard' ?></div></div>
                <div class="grid_3 omega">
                    <div class="topRight">欢迎您， <?php echo Yii::app()->user->name ?>, <?php echo CHtml::link('退出', array('/user/logout'))?></div>
                </div>
	</div><!-- header -->
        
        <div class="clear"></div>

	<div id="mainmenu">
		<?php $this->widget('WAdminMenu')?>
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
                'homeLink'=>CHtml::link('后台首页', array('/admin'))
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; 2011-<?php echo date('Y'); ?> by <?php echo CHtml::link('Yincart', 'http://yincart.com', array('target'=>'_blank'))?>.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>