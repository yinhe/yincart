<div class="go_pay"><?php echo CHtml::link('结算', array('/order/checkout'))?></div>
<div class="buy_car"><i class="icon-shopping-cart" style='padding-right:5px'></i><?php echo CHtml::link('购物车', array('/cart'))?>(<font style="color:red"><?php echo $this->getCount() ?></font>)</div>
<?php if(Yii::app()->user->isGuest){?>
<div class="login"><?php echo CHtml::link('登录', array('/user/login'))?>&nbsp;|&nbsp;<?php echo CHtml::link('注册', array('/user/registration'))?></div>
<?php }else{?>
<div class="login">欢迎您，<?php echo Yii::app()->user->name ?>&nbsp;|&nbsp;<?php echo CHtml::link('会员中心', array('/member'))?>&nbsp;|&nbsp;<?php echo CHtml::link('退出', array('/site/logout'))?></div>
<?php } ?>
<div class="lang"><a href="" class="current">中文</a>&nbsp;/&nbsp;<a href="">English</a></div>