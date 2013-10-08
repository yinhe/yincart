
<!DOCTYPE html>
<html lang="en">
    <head>
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $_SESSION['store']['name'] ?></title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo F::themeUrl() ?>/assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo F::themeUrl() ?>/assets/css/main.css" rel="stylesheet">
	<link href="<?php echo F::themeUrl() ?>/assets/css/bootstrap-glyphicons.css" rel="stylesheet">



	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="<?php echo F::themeUrl() ?>/assets/js/html5shiv.js"></script>
	  <script src="<?php echo F::themeUrl() ?>/assets/js/respond/respond.min.js"></script>
	<![endif]-->

	<!-- Favicons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo F::themeUrl() ?>/assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo F::themeUrl() ?>/assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo F::themeUrl() ?>/assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo F::themeUrl() ?>/assets/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="<?php echo F::themeUrl() ?>/assets/ico/favicon.png">
	<script src="http://l.tbcdn.cn/apps/top/x/sdk.js?appkey=12457236"></script>
	<!-- Place anything custom after this. -->
    </head>
    <body>

	<!-- Page content of course! -->
	<!-- Custom styles for this template -->
	<style>
	    /* Move down content because we have a fixed navbar that is 50px tall */
	    body {
		padding-top: 50px;
		padding-bottom: 20px;
	    }

	    /* Set widths on the navbar form inputs since otherwise they're 100% wide */
	    .navbar-form input[type="text"],
	    .navbar-form input[type="password"] {
		width: 180px;
	    }

	    /* Wrapping element */
	    /* Set some basic padding to keep content from hitting the edges */
	    .body-content {
		padding-left: 15px;
		padding-right: 15px;
	    }

	    /* Responsive: Portrait tablets and up */
	    @media screen and (min-width: 768px) {
		/* Let the jumbotron breathe */
		.jumbotron {
		    margin-top: 20px;
		}
		/* Remove padding from wrapping element since we kick in the grid classes here */
		.body-content {
		    padding: 0;
		}
	    }
	</style>
	
	    
	<div class="navbar navbar-inverse navbar-fixed-top">
	    <div class="container">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"><?php echo $_SESSION['store']['name'] ?></a>
		<div class="nav-collapse collapse">
		    <ul class="nav navbar-nav">
			<li class="active"><?php echo CHtml::link('首页', Yii::app()->homeUrl) ?></li>
			<li><?php echo CHtml::link('关于我们', array('/page/index', 'key'=>'about')) ?></li>
			<li><?php echo CHtml::link('产品列表', array('/item/index')) ?></li>
			<li><?php echo CHtml::link('联系我们', array('/page/index', 'key'=>'contact')) ?></li>
<!--			<li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
			    <ul class="dropdown-menu">
				<li><a href="#">Action</a></li>
				<li><a href="#">Another action</a></li>
				<li><a href="#">Something else here</a></li>
				<li class="divider"></li>
				<li class="nav-header">Nav header</li>
				<li><a href="#">Separated link</a></li>
				<li><a href="#">One more separated link</a></li>
			    </ul>
			</li>-->
		    </ul>
		    <form class="navbar-form form-inline pull-right">
			<input type="text" placeholder="Email">
			<input type="password" placeholder="Password">
			<button type="submit" class="btn">Sign in</button>
		    </form>
		</div><!--/.nav-collapse -->
	    </div>
	</div>

	<div class="container">
	    <?php echo $content; ?>
        </div> <!-- /container -->
	
	
	<div class="container">
	    <hr>

    <footer>
      <p>&copy; Company 2013</p>
    </footer>
  </div>
	</div>
	<!-- JS and analytics only. -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo F::themeUrl() ?>/assets/js/jquery.js"></script>
	<script src="<?php echo F::themeUrl() ?>/assets/js/bootstrap.js"></script>


	<script src="<?php echo F::themeUrl() ?>/assets/js/holder/holder.js"></script>

	<script src="<?php echo F::themeUrl() ?>/assets/js/application.js"></script>

    </body>
</html>
