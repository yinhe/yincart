<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<title>Flat UI Kit - HTML/PSD Design Framework</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Loading Bootstrap -->
	<link href="<?php echo F::themeUrl() ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo F::themeUrl() ?>/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

	<!-- Loading Flat UI -->
	<link href="<?php echo F::themeUrl() ?>/css/flat-ui.css" rel="stylesheet">
	<link href="<?php echo F::themeUrl() ?>/css/main.css" rel="stylesheet">

	<link rel="shortcut icon" href="<?php echo F::themeUrl() ?>/images/favicon.ico">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	<![endif]-->
    </head>
    <body>
	<div class="top_nav">
	    <div class="container">
		<div class="row">
		    <div class="span6">欢迎来到<?php echo Yii::app()->name ?></div>
		    <div class="span6 top_right">
			<?php $this->widget('widgets.flatui.WTopNav') ?>
		    </div>
		</div>
	    </div>
	</div>


	<div class="container">
	    <div class="header">
		<div class="row">
		    <div class="span4">
			<div class="logo">
			    <?php echo CHtml::image(F::baseUrl() . '/images/logo.png') ?>
			</div>
		    </div>
		    <div class="span8">
			<div class="search">
			    <?php $this->widget('widgets.flatui.WSearch') ?>
			</div>
		    </div>
		</div>
	    </div>
	</div>


	<div class="container">
	    <div class="row">
		<div class="span12">
		    <div class="navbar navbar-inverse">
			<div class="navbar-inner">
			    <div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse-01"></button>
				<div class="nav-collapse collapse" id="nav-collapse-01">
				    <?php $this->widget('widgets.flatui.WMainMenu') ?>
				</div><!--/.nav -->
			    </div>
			</div>
		    </div>
		</div>
	    </div> <!-- /row -->

	</div>

	<div class="container">
		<?php echo $content; ?>
	</div>

	<footer>
	    <div class="container">
		<div class="helpcenter">
<?php $this->widget('widgets.default.WHelpCenter') ?>
	    </div>
	    <div class="line"></div>
	    <div class="footnav">
		<?php $this->widget('widgets.default.WFootMenu') ?>
	    </div>
	    <div class="paylink">
<?php $this->widget('widgets.default.WFriendLink') ?>
	    </div>
	    <div class="foot_copyright">
		<p>Copyright © 2012-2020 <?php echo Yii::app()->name ?>.All Rights Reserved.</p>
	    </div>
	    </div>
	</footer>

	<!-- Load JS here for greater good =============================-->
	<script src="<?php echo F::themeUrl() ?>/js/jquery-1.8.3.min.js"></script>
	<script src="<?php echo F::themeUrl() ?>/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="<?php echo F::themeUrl() ?>/js/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo F::themeUrl() ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo F::themeUrl() ?>/js/bootstrap-select.js"></script>
	<script src="<?php echo F::themeUrl() ?>/js/bootstrap-switch.js"></script>
	<script src="<?php echo F::themeUrl() ?>/js/flatui-checkbox.js"></script>
	<script src="<?php echo F::themeUrl() ?>/js/flatui-radio.js"></script>
	<script src="<?php echo F::themeUrl() ?>/js/jquery.tagsinput.js"></script>
	<script src="<?php echo F::themeUrl() ?>/js/jquery.placeholder.js"></script>
	<script src="<?php echo F::themeUrl() ?>/js/jquery.stacktable.js"></script>
	<!--<script src="http://vjs.zencdn.net/c/video.js"></script>-->
	<script src="<?php echo F::themeUrl() ?>/js/application.js"></script>
    </body>
</html>
