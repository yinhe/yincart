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

<!--    <form class="form-signin" action="--><?php //echo Yii::app()->createUrl('/admin/default/login') ?><!--" method="post">-->
<!--        <h2 class="form-signin-heading">Please Login</h2>-->
<!--        <input type="text" class="form-control" placeholder="Email address" name="LoginForm[email]" autofocus>-->
<!--        <input type="text" class="form-control" placeholder="Email address" autofocus>-->
<!--        <input type="password" class="form-control" placeholder="Password" name="LoginForm[password]">-->
<!--        <label class="checkbox">-->
<!--            <input type="checkbox" value="remember-me"> Remember me-->
<!--        </label>-->
<!--        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>-->
<!--    </form>-->


    <?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

        <div class="success">
            <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
        </div>

    <?php endif; ?>



    <div class="form">
        <?php echo CHtml::beginForm(Yii::app()->createUrl('/admin/default/login'), 'post', array('class'=>'form-signin')); ?>
        <h2 class="form-signin-heading">商家管理后台</h2>

        <?php echo CHtml::errorSummary($model, '请更正以下错误：', NULL, array('class'=>'text-danger')); ?>

        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'username'); ?>
            <?php echo CHtml::activeTextField($model,'username', array('class'=>'form-control')) ?>
        </div>

        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'password'); ?>
            <?php echo CHtml::activePasswordField($model,'password', array('class'=>'form-control')) ?>
        </div>

        <div class="form-group">
            <p class="hint">
                <?php echo CHtml::link(F::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
            </p>
        </div>

        <div class="checkbox">
            <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
            <?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
        </div>

            <?php echo CHtml::submitButton(F::t("Login"), array('class'=>'btn btn-lg btn-primary btn-block')); ?>

        <?php echo CHtml::endForm(); ?>
    </div><!-- form -->


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);

?>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
