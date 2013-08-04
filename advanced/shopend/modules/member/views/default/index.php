<?php
$this->breadcrumbs=array(
	'会员中心',
);
?>

<?php 

    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => '会员中心',
    'headerIcon' => 'icon-home',
    'content' => Yii::app()->user->name.', 欢迎您来到会员中心。' // $this->renderPartial('_view')
    ));
?>