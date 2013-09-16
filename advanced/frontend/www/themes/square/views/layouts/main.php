<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, width=500px">
	<title><?php echo Yii::app()->name;?></title>
	<link rel="stylesheet" href="<?php echo F::themeUrl() ?>/dist/css/bootstrap.css"/>
	<link rel="stylesheet" href="<?php echo F::themeUrl() ?>/css/main.css"/>
	<!--<script type="text/javascript" src="<?php echo F::themeUrl() ?>/dist/js/jquery.js"></script>-->
	<script type="text/javascript" src="<?php echo F::themeUrl() ?>/dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo F::baseUrl() ?>/js/holder.js"></script>
	<script src="http://l.tbcdn.cn/apps/top/x/sdk.js?appkey=21577181"></script>
	<?php F::jquery(); ?>
    </head>
    <body>
	<div class="row">
	    <div class="col-span-12">
		<div class="top_nav background-color-00">
		    <div class="row show-grid">
			<div class="col-span-2 text-left">欢迎来到<?php echo Yii::app()->name ?></div>
			<div class="col-span-6 top_left">
			<?php $this->widget('widgets.square.WLanguage') ?>
			</div>
			<div class="col-span-4 text-right">
			    <?php $this->widget('widgets.square.WTopNav') ?>
			</div>
		    </div>
		</div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-span-12">
		<div class="header">
		    <div class="row show-grid">
			<div class="col-span-4">
			    <div class="logo">
				<?php echo Yii::app()->name ?>
			    </div>
			</div>
			<div class="col-span-5">
			    <div class="search">
				<?php $this->widget('widgets.square.WSearch') ?>
			    </div>
			</div>
			<div class="col-span-3">

			</div>
		    </div>
		</div>
	    </div>
	</div>
	<div class="col-span-12">
	    <div class="menu btn-group background-color-3 full-width">
		<div class="btn btn-small heart background-color-hover-1"></div>
		<?php $this->widget('widgets.square.WMainMenu') ?>
		<?php if (!Yii::app()->user->isGuest): ?>
    		<div class="btn btn-large borderless no-pad pull-right">
    		    <div id="dlabel" class="menu-dropdown text-right" data-toggle="dropdown">我的信息<span class="caret-down"></span></div>
    		    <ul id="dropdown-3" class="dropdown-menu dropdown-menu-right background-color-1" role="menu" aria-labelledby="dlabel">
    			<li role="menuitem" data-value="Send Message" class="background-color-hover-3"><div class="dropdown-image eye-transparent"></div>最新消息</li>
    			<li role="menuitem" data-value="Settings" class="background-color-hover-3"><div class="dropdown-image person-transparent"></div>账户设置</li>
    			<li role="menuitem" data-value="Favorite" class="background-color-hover-3"><div class="dropdown-image beaker-transparent"></div>收藏列表</li>
    		    </ul>
    		</div>
		<?php endif; ?>
	    </div>
	</div>
	<div class="row">
	    <div class="col-span-12 main-content">
		<?php echo $content ?>
	    </div>
	</div>

	<div class="row">
	    <div class="col-span-12">
		<div class="help-center background-color-2">
		<?php $this->widget('widgets.square.WHelpCenter') ?>
		</div>
	    </div>
	</div>

	<div class="row">
	    <div class="col-span-12">
		<div class="footer background-color-00 dark-text">
		    <?php $this->widget('widgets.square.WFriendLink') ?>
		    <p><?php $this->widget('widgets.square.WFootMenu') ?></p>
		    <p class="copyright">Copyright © 2012-2015 <?php echo CHtml::link(Yii::app()->name, 'http://'.F::sg('site', 'frontDomain'), array('target' => '_blank')) ?>.All Rights Reserved.</p>
		</div>
	    </div>
	</div>
    </body>
</html>    