<?php
$cs = Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.blockUI.1.33.js');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/common.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/backtop/js/scrolltop.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/holder.js"></script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script type="text/javascript">
	    var SITE_URL = "<?php echo Yii::app()->request->baseUrl ?>";
	    var UserId = '<?PHP echo Yii::app()->user->id ?>';
	    var RETURN_URL = '<?PHP echo Yii::app()->request->url ?>';
        </script>
	<?php Yii::app()->bootstrap->register(); ?>
    </head>

    <body>

        <div id="header">
            <div class="hd_top">
                <div class="container">
                    <div class="row">
                        <div class="span12">
			    <?php $this->widget('widgets.default.WTopNav') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hd">
                <div class="container">
		    <div class="row">
			<div class="span4"><a href="" title><img alt="logo" src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.png" width="320" height="60"/></a></div>
			<div class="span8 top_search">
			    <div class="top_search"><?php $this->widget('widgets.default.WSearch') ?></div>
			</div>
		    </div>
                </div>
            </div>
            <div id="nav">
                <div class="container">
                    <div class="row">
                        <div class="span12">
			    <?php $this->widget('widgets.default.WMainMenu') ?>
                        </div>
                    </div>
                </div>
            </div>
	</div>
	<div class="container">
	    <?php if ($this->breadcrumbs) { ?>
    	    <div class="row">
    		<div class="span12" style="margin-top:20px">
			<?php
			echo TbHtml::breadcrumbs(array_merge(array('首页'=>Yii::app()->homeUrl), $this->breadcrumbs));
			?><!-- breadcrumbs -->
    		</div>
    	    </div>
<?php } ?>
<?php echo $content ?>


	</div>

	<div class="clear"></div>

	<div id="footer">
	    <div class="helpcenter">
<?php $this->widget('widgets.default.WHelpCenter') ?>
	    </div>
	    <div class="line"></div>
	    <div class="footnav">
		<?php $this->widget('widgets.default.WFootMenu') ?>
	    </div>
	    <div class="paylink">
<?php $this->widget('widgets.default.WFriendLink') ?>
	    </div>
	    <div class="foot_copyright">
		<p>Copyright © 2012-2020 <?php echo Yii::app()->name ?>.All Rights Reserved.</p>
	    </div>
	</div>

<?php //$this->widget('WCustomerService')  ?>
	<div style="display:none" id="goTopBtn"><a title="返回顶部" class="ui-scrolltop" id="J_ScrollTopBtn">返回顶部</a></div>
	<script type="text/javascript">goTopEx();</script>

    </body>
</html>
