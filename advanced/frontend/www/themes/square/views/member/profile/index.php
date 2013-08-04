<?php
/* @var $this ProfileController */

$this->breadcrumbs=array(
        '会员中心'=>array('/member'),
	'个人资料',
);
?>

<h3>个人资料</h3>
<dl class="dl-horizontal">
    <dt>用户名</dt><dd><?php echo $username ?></dd>
    <dt>邮箱</dt><dd><?php echo $email ?></dd>
</dl>