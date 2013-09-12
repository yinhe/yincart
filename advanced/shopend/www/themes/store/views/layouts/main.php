<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title><?php echo Yii::app()->name ?> - 免费创建您自己的在线店铺！</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="<?php echo F::themeUrl() ?>/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?php echo F::themeUrl() ?>/css/main.css" rel="stylesheet" media="screen">
	<!-- Custom styles for this template -->
    </head>
    <body>

	<!-- NAVBAR
	================================================== -->
	<div class="navbar-wrapper">
	    <!--<div class="container">-->

		<div class="navbar navbar-inverse navbar-static-top">
		    <div class="container">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><?php echo Yii::app()->name ?></a>
			<div class="nav-collapse collapse pull-right">
			    <ul class="nav navbar-nav">
				<li class="active"><a href="#">店铺指南</a></li>
				<li><a href="#contact">登录</a></li>
			    </ul>
			</div>
		    </div>
		</div>

	    <!--</div>-->
	</div>

	<?php echo $content; ?>
	<div class="container">
	<!-- FOOTER -->
	<footer>
	    <p class="pull-right"><a href="#">Back to top</a></p>
	    <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
	</footer>
	</div>
    <!-- JavaScript plugins (requires jQuery) -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo F::themeUrl() ?>/assets/js/bootstrap.min.js"></script>

    <script src="<?php echo F::themeUrl() ?>/assets/js/holder/holder.js"></script>

    <script src="<?php echo F::themeUrl() ?>/assets/js/application.js"></script>
    <!-- Optionally enable responsive features in IE8 -->
    <script src="<?php echo F::themeUrl() ?>/assets/js/respond.js"></script>
</body>
</html>