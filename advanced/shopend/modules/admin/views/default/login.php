<?php
$cs = Yii::app()->clientScript;
$cs->coreScriptPosition = CClientScript::POS_HEAD;
$cs->scriptMap = array();
$baseUrl = $this->module->assetsUrl;
$cs->registerCoreScript('jquery');
$cs->registerScriptFile($baseUrl . '/js/settings.js');
$cs->registerScriptFile($baseUrl . '/js/underscore-min.js');
//$cs->registerCssFile($baseUrl.'/js/fancybox/jquery.fancybox-1.3.1.css');
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
    <link href="<?php echo $baseUrl ?>/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $baseUrl ?>/js/html5shiv.js"></script>
    <script src="<?php echo $baseUrl ?>/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <form class="form-signin" action="<?php echo Yii::app()->createUrl('/admin/default/login') ?>" method="post">
        <h2 class="form-signin-heading">Please Login</h2>
<!--        <input type="text" class="form-control" placeholder="Email address" name="LoginForm[email]" autofocus>-->
        <input type="password" class="form-control" placeholder="Password" name="LoginForm[password]">
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
