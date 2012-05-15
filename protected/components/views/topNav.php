<div class="go_pay"><a href="">结算</a></div>
<div class="buy_car">购物车(0)</div>
<?php if(Yii::app()->user->isGuest){?>
<div class="login"><?php echo CHtml::link('登录', array('/user/login'))?>&nbsp;|&nbsp;<?php echo CHtml::link('注册', array('/user/registration'))?></div>
<?php }else{?>
<div class="login">欢迎您，<?php echo Yii::app()->user->name ?>&nbsp;|&nbsp;<?php echo CHtml::link('会员中心', array('/member'))?>&nbsp;|&nbsp;<?php echo CHtml::link('退出', array('/user/logout'))?></div>
<?php } ?>
<div class="lang"><a href="" class="current">中文</a>&nbsp;/&nbsp;<a href="">English</a></div>