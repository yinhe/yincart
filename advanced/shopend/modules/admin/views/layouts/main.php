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
$cs->registerCssFile($baseUrl . '/css/admin.css');
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo CHtml::encode($this->pageTitle) ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php Yii::app()->bootstrap->register(); ?>
</head>
<body>
<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'color' => TbHtml::NAVBAR_COLOR_INVERSE,
    'brandLabel' => '商家管理后台',
    'collapse' => true,
    'fluid' => true,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => array(
                array('label' => '内容管理', 'url' => '#', 'items' => array(
                    array('label' => '内容分类', 'url' => array('/admin/cmsCategory/admin')),
                    array('label' => '单页管理', 'url' => array('/admin/page/admin')),
                    array('label' => '帖子管理', 'url' => array('/admin/post/admin')),
                )),
                array('label' => '商城管理', 'url' => '#', 'items' => array(
                    array('label' => '商品分类', 'url' => array('/admin/itemCategory/admin')),
                    array('label' => '商品列表', 'url' => array('/admin/item/list')),
                    array('label' => '订单列表', 'url' => array('/admin/order/list')),
                )),
                array('label' => '系统设置', 'url' => '#', 'items' => array(
//                    array('label' => '菜单', 'url' => array('/admin/menu/admin')),
                    array('label' => '店铺分类', 'url' => array('/admin/storeCategory/admin')),
//                    array('label' => '皮肤', 'url' => '#'),
//                    array('label' => '插件', 'url' => '#'),
                )),
            ),
        ),
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => array(
                array('label' => '网站前台', 'url' =>array('/site/index')),
                array('label' => '站点配置', 'url' => '/admin/settings'),
                array('label' => Yii::app()->user->name, 'url' => '#', 'items' => array(
                    array('label' => '个人资料', 'icon'=>'user', 'url' => '/admin/user/profile'),
                    array('label' => '退出', 'icon'=>'off', 'url' => array('/admin/default/logout')),
                )),
            ),
            'htmlOptions' => array('class' => 'pull-right')
        ),
    ),
)); ?>

<div class="container-fluid">
    <div id="content">
        <?php echo $content ?>
    </div>

</div>
<!-- /.container -->
<footer>
    <div class="row-fluid">
        <div class="span12">
            <p class="powered"><?php echo Yii::powered(); ?>
                / <?php echo CHtml::link('Yincart', 'http://yincart.com'); ?>
                <span class="copy">Copyright &copy; <?php echo date('Y'); ?> by <?php echo F::sg('site', 'name'); ?>
                    . All Rights Reserved.</span>
            </p>
        </div>
    </div>
</footer>
<!-- footer -->
</body>
</html>