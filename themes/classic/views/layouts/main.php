<!doctype html>
<html>
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/common.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/box.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/grid.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/core.css"/>
    </head>
    <body>
        <div id="header">
            <div class="hd_top">
                <?php $this->widget('WTopNav') ?>
            </div>
            <div class="hd">
                <div class="hd2">
                    <div class="common_left"><a href="" title><img alt="logo" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" width="329" height="64"/></a></div>
                    <div class="common_right">
                        <div class="search"><input type="text" name="searchkey" value="品名或商品号" class="search_input" onblur="if(this.value=='') this.value='品名或商品号';"onfocus="if(this.value=='品名或商品号') this.value='';"/><input type="submit" class="search_submit" value="搜索"/></div>
                        <div class="clear"></div>
                        <div class="phone">
                            订购热线：400 615 1818
                        </div>
                    </div>
                </div>			
            </div>
        </div>
        <div id="nav">
            <?php $this->widget('WMainMenu') ?>
        </div>
        <div class="container_25">
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
                'homeLink'=>'当前位置：首页'
	)); ?><!-- breadcrumbs -->
        
        <div class="main grid_25">
            <?php echo $content ?>
        </div>
        
        <div class="clear"></div>
        
        <div id="footer">
            <div class="helpcenter">
                <?php $this->widget('WHelpCenter')?>
            </div>
            <div class="line"></div>
            <div class="footnav">
<!--                <a href="">关于我们</a>&nbsp;|&nbsp;
                <a href="">联系我们</a>&nbsp;|&nbsp;
                <a href="">招聘信息</a>&nbsp;|&nbsp;
                <a href="">商城公告</a>&nbsp;|&nbsp;
                <a href="">行业新资讯</a>&nbsp;|&nbsp;
                <a href="">业务合作</a>&nbsp;|&nbsp;
                <a href="">网站地图</a>-->
                <?php $this->widget('WFootMenu') ?>
            </div>
            <div class="paylink">
                <?php $this->widget('WFriendLink') ?>
            </div>
            <div class="foot_copyright">
                <p>Copyright © 2012-2015 聚货电子商务.All Rights Reserved.</p>
                <p><?php echo CHtml::link('银河方舟', 'http://yinheark.com', array('target'=>'_blank')) ?>  全程技术支持</p>
            </div>
        </div>
        </div>
        <script type="text/javascript" src="http://js.tongji.linezing.com/2863871/tongji.js"></script><noscript><a href="http://www.linezing.com"><img src="http://img.tongji.linezing.com/2863871/tongji.gif"/></a></noscript>
    </body>
</html>