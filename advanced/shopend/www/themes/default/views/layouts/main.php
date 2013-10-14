<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>shop demo</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo F::themeUrl() ?>/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="<?php echo F::themeUrl() ?>/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo F::themeUrl() ?>/css/main.css" rel="stylesheet">
    <!-- link to the CSS files for this menu type -->
    <link rel="stylesheet" media="screen" href="<?php echo F::themeUrl() ?>/css/superfish.css">
    <link rel="stylesheet" media="screen" href="<?php echo F::themeUrl() ?>/css/superfish-vertical.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo F::themeUrl() ?>/js/html5shiv.js"></script>
    <script src="<?php echo F::themeUrl() ?>/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ShopTest</a>
            <p class="navbar-text">welcome, <a href="#" class="navbar-link">
                    <?php
                    echo Yii::app()->user->name;
                    if(Yii::app()->getModule('user')->isAdmin()){
                        echo CHtml::link(' 后台管理 ', array('/admin'));
                    }

                    if(!Yii::app()->user->isGuest){
                        echo CHtml::link('Logout', array('/user/logout'));
                    }else{
                        echo CHtml::link(' Login', array('/user/login'));
                    }
                    ?></a>
            </p>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">购物车 <span class="badge">42</span></a></li>
                <li><?php echo CHtml::link('会员中心', array('/member')) ?></li>
                <li><a href="#contact">联系客服</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">网站导航 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container theme-showcase">
<div class="header">
    <div class="row">
        <div class="col-lg-3 logo"><h1>Shop Test</h1></div>
        <div class="col-lg-9 search">
            <form class="form-inline" role="form">
                <div class="col-lg-7">
                    <input type="search" class="form-control input-lg"  placeholder="Please enter the keyword">
                </div>
                <div class="col-lg-2">
                    <select class="form-control input-lg">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-default btn-lg">Search</button>

            </form>
        </div>
    </div>
</div>
<?php echo $content ?>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo F::themeUrl() ?>/js/jquery.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/bootstrap.min.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/holder.js"></script>
<!-- link to the JavaScript files (hoverIntent is optional) -->
<!-- if you use hoverIntent, use the updated r7 version (see FAQ) -->
<script src="<?php echo F::themeUrl() ?>/js/hoverIntent.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/superfish.js"></script>
<!-- initialise Superfish -->
<script>
    jQuery(document).ready(function(){
        jQuery('ul.sf-menu').superfish({
            animation: {height:'show'},	// slide-down effect without fade-in
            delay:		 1200			// 1.2 second delay on mouseout
        });
    });
</script>
</body>
</html>
