<?php
$cs = Yii::app()->clientScript;
$cs->coreScriptPosition = CClientScript::POS_HEAD;
$cs->scriptMap = array();
$baseUrl = $this->module->assetsUrl;
$cs->registerCoreScript('jquery');
//$cs->registerScriptFile($baseUrl . '/js/html5shiv.js');
//$cs->registerScriptFile($baseUrl . '/js/respond.min.js');
//$cs->registerScriptFile($baseUrl . '/js/bootstrap.min.js');
//$cs->registerCssFile($baseUrl.'/css/bootstrap.css');
//$cs->registerCssFile($baseUrl.'/css/starter-template.css');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo CHtml::encode($this->pageTitle)?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $baseUrl ?>/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $baseUrl ?>/css/admin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $baseUrl ?>/js/html5shiv.js"></script>
    <script src="<?php echo $baseUrl ?>/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">商家后台管理</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">控制面板</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">我的店铺 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">订单</a></li>
                        <li><a href="#">客户</a></li>
                        <li><a href="#">折扣</a></li>
                        <li><?php echo CHtml::link('商品', array('/item/list'))?></li>
                        <li><a href="#">收藏</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">我的网站 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">帖子</a></li>
                        <li><a href="#">单页</a></li>
                        <li><a href="#">导航</a></li>
                        <li><a href="#">皮肤</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">商店配置 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">手机网站</a></li>
                        <li><a href="#">站点设置</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><?php echo CHtml::link('网站前台', Yii::app()->homeUrl) ?></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Yii::app()->user->name ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">个人资料</a></li>
                        <li><?php echo CHtml::link('退出', array('/admin/default/logout')) ?></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">

    <?php echo $content ?>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $baseUrl ?>/js/bootstrap.min.js"></script>
</body>
</html>
