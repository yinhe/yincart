
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
    <!-- link to the CSS files for this menu type -->
    <link rel="stylesheet" media="screen" href="css/superfish.css">
    <link rel="stylesheet" media="screen" href="css/superfish-vertical.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">HaoFine</a>
            <p class="navbar-text">Signed in as <a href="#" class="navbar-link">Mark Otto</a></p>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">购物车 <span class="badge">42</span></a></li>
                <li><a href="#about">会员中心</a></li>
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
            <div class="col-lg-3 logo"><h1>Hao Fine</h1></div>
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
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>
        <h3>商品详情</h3>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <img data-src="holder.js/100%x360" alt="...">
        </div>
        <div class="col-lg-8">
            <ul>
                <li>1111</li>
                <li>1111</li>
                <li>1111</li>
                <li>1111</li>
                <li>1111</li>
            </ul>
        </div>
    </div>
    <div class="item-detail">
        <ul class="nav nav-tabs">
            <li class="active"><a href="javascript:void()">商品描述</a></li>
            <li><a href="javascript:void()">配送和支付方式</a></li>
            <li><a href="javascript:void()">评价详情</a></li>
        </ul>
    </div>
    <div class="page-header">
        <h3>推荐商品</h3>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
                <img data-src="holder.js/100%x180" alt="...">
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
                <img data-src="holder.js/100%x180" alt="...">
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
                <img data-src="holder.js/100%x180" alt="...">
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
                <img data-src="holder.js/100%x180" alt="...">
            </a>
        </div>
    </div>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/holder.js"></script>
<!-- link to the JavaScript files (hoverIntent is optional) -->
<!-- if you use hoverIntent, use the updated r7 version (see FAQ) -->
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
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
