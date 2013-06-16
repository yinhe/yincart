<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php
    $cs = Yii::app()->clientScript;
    $baseUrl = $this->module->assetsUrl;
    $cs->registerCssFile($baseUrl . '/css/screen.css');
    $cs->registerCssFile($baseUrl . '/css/main.css');
    $cs->registerCssFile($baseUrl . '/css/form.css');
    $cs->registerCssFile($baseUrl . '/img/bg.gif');
    ?>

    <?php Yii::app()->seo->run(); ?>
</head>

<body>

<div class="container" id="page">

    <div id="header">
        <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>

    </div>
    <!-- header -->

    <?php if (isset($this->breadcrumbs)): ?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'links' => $this->breadcrumbs,
    )); ?><!-- breadcrumbs -->

    <?php endif?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        Developed by : <a target="_blank" href="http://idol-it.com">Idol-IT</a>

        <?php echo Yii::powered(); ?>
    </div>
    <!-- footer -->

</div>
<!-- page -->

</body>
</html>
