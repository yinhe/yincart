<!DOCTYPE html>
<html class="no-js" lang="en"><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" href="http://cdn.shopify.com/s/files/1/0153/0849/t/4/assets/favicon.png?44" type="image/png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo Yii::app()->name ?></title>
        <meta name="description" content="Minimal Fashion is a responsive theme for Shopify designed by Alex MacDonell. It is available for purchase in the Shopify Theme Store.">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="canonical" href="<?php echo Yii::app()->theme->baseUrl ?>/media/media.htm"> 
        <meta property="og:site_name" content="Minimal Jewelry Theme">
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/media/styles.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl ?>/media/css">
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/media/html5shiv.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/media/theme-controls.css" type="text/css">
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/media/jsapi"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/media/jquery.min.js"></script>
    </head>
    <body>
        <!--Begin toolbar--> 
        <?php $this->widget('widgets.fashion.WTopNav') ?>
        <!--End toolbar--> 
        <!-- Begin wrapper -->
        <div id="transparency" class="wrapper">
            <div class="row">      
                <div id="header" class="row">
                    <div class="span12 border-bottom">
                        <div class="span3 inner-left">
                            <div class="logo">
                                <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/media/logo.png') ?>
                            </div> 
                        </div> 
                        <section id="nav">
                            <div class="span9 inner-right">
                                <nav class="main">
                                    <?php $this->widget('widgets.fashion.WMainMenu') ?>
                                </nav> 
                                <!--              <nav class="mobile clearfix">
                                <select class="fl" id="main_navigation" name="main_navigation">
                                    <option selected="selected" value="/">Home</option>
                                    <option value="/collections/all-products">Shop</option>
                                      <option value="/collections/all-products">- All Products</option>
                                      <option value="/collections/spring-collection">- Spring Collection</option>
                                      <option value="/collections/summer-collection">- Summer Collection</option>
                                    <option value="/blogs/news">Blog</option>
                                    <option value="/pages/theme-features">Theme Features</option>
                                    <option value="/pages/contact">Contact</option>
                                    <option value="http://themes.shopify.com/themes/minimal/styles/fashion">Purchase Theme</option>
                                  <option value="/cart">Your cart (0)</option>
                                </select>
                                              </nav>-->
                            </div> 
                        </section> 
                    </div> 
                </div>
                <!-- Begin content-->
                <?php echo $content ?>
                <!-- End content-->
            </div>
        </div>
        <!-- End wrapper -->
        <!-- Begin footer -->
        <div class="footer-wrapper">
            <footer>
                <div class="row">
                    <div class="span12 full-border"></div>
                    <!-- Begin latest blog post -->
                    <div class="span4">
                        <div class="p30">
                            <h4>
                                <?php echo CHtml::link('Latest news', array('/article/index')) ?>
                            </h4>
                            <?php
                            $cri = new CDbCriteria(array(
                                'order' => 'article_id desc',
                                'limit' => '1'
                            ));
                            $news = Article::model()->find($cri);
                            ?>
                            <p class="p10"><strong>
                                    <?php echo CHtml::link($news->title, array('/article/view', 'id' => $news->article_id)) ?>
                                </strong>
                            </p>
                            <p><?php echo htmlentities(F::msubstr($news->summary, '0', '300', 'utf-8')) ?>...</p>
                        </div>
                    </div>
                    <!-- End latest blog post -->
                    <!-- Begin footer navigation -->
                    <div class="span4 footer-menu">
                        <h4>Quick Links</h4>
                        <ul class="unstyled">
<!--                            <li><a href="<?php echo Yii::app()->theme->baseUrl ?>/media/media.htm" title="Home">Home</a></li>
                            <li><a href="http://minimal-jewelry.myshopify.com/collections/all-products" title="Our Products">Our Products</a></li>
                            <li><a href="http://minimal-jewelry.myshopify.com/blogs/news" title="Blog">Blog</a></li>
                            <li><a href="http://minimal-jewelry.myshopify.com/pages/theme-features" title="Features">Features</a></li>
                            <li><a href="http://minimal-jewelry.myshopify.com/pages/contact" title="Contact">Contact</a></li>
                            <li><a href="http://themes.shopify.com/themes/minimal/styles/jewelry" title="Purchase Theme">Purchase Theme</a></li>-->
                            <?php $this->widget('widgets.fashion.WFootMenu') ?>
                        </ul>

                    </div>
                    <!-- End footer navigation -->
                    <!-- Begin newsletter/social -->
                    <div class="span4">
                        <div class="p30">
                            <h4>Newsletter</h4>
                            <form action="<?php echo Yii::app()->createUrl('/cms/newsletterSubscriber/sub') ?>" method="post" id="newsletter-subscriber-form" name="mc-embedded-subscribe-form" target="_blank">
                                <input type="email" value="" placeholder="Email Address" name="NewsletterSubscriber[email]" id="mail"><input type="submit" class="btn newsletter" value="Subscribe" name="subscribe" id="subscribe">
                            </form>
                        </div>
                        <div class="clearfix">
                            <h4>Follow us</h4>
                            <a href="#" title="Minimal Jewelry Theme on Twitter" class="icon-social twitter">Twitter</a>
                            <a href="#" title="Minimal Jewelry Theme on Facebook" class="icon-social facebook">Facebook</a>
                            <a href="#" title="Minimal Jewelry Theme on YouTube" class="icon-social youtube">YouTube</a>
                            <a href="#" title="Minimal Jewelry Theme on Instagram" class="icon-social instagram">Instagram</a>
                            <a href="#" title="Minimal Jewelry Theme on Pinterest" class="icon-social pinterest">Pinterest</a>
                            <a href="#" title="Minimal Jewelry Theme on Vimeo" class="icon-social vimeo">Vimeo</a>
                            <a href="#" title="Minimal Jewelry Theme on Google+" class="icon-social google">Google+</a>
                        </div>
                    </div>
                    <!-- End newsletter/social -->
                    <!-- Begin copyright -->
                    <div class="span12 tc copyright">
                        <p><?php $this->widget('widgets.fashion.WCustomerService') ?></p>
                        <p>Copyright © 2013 <?php echo Yii::app()->name ?> | <?php echo CHtml::link('Build with Yincart shop system', 'http://yincart.com', array('target' => '_blank')) ?>  </p>
                        <ul class="credit-cards clearfix">
                        </ul> <!-- /.credit-cards -->
                    </div>
                    <!-- End copyright -->
                </div>
            </footer>
        </div>
        <!-- End footer -->
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/media/option_selection.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/media/api.jquery.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/media/jquery.flexslider-min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/media/jquery.tweet.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/media/jquery.fancybox.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/media/scripts.js" type="text/javascript"></script>
        <script type="text/javascript">
            Shopify.money_format = "${{amount}}";
        </script>
        <div id="fancybox-tmp"></div>
        <div id="fancybox-loading"><div></div></div>
        <div id="fancybox-overlay"></div>
        <div id="fancybox-wrap">
            <div id="fancybox-outer">
                <div class="fancy-bg" id="fancy-bg-n"></div>
                <div class="fancy-bg" id="fancy-bg-ne"></div>
                <div class="fancy-bg" id="fancy-bg-e"></div>
                <div class="fancy-bg" id="fancy-bg-se"></div>
                <div class="fancy-bg" id="fancy-bg-s"></div>
                <div class="fancy-bg" id="fancy-bg-sw"></div>
                <div class="fancy-bg" id="fancy-bg-w"></div>
                <div class="fancy-bg" id="fancy-bg-nw"></div>
                <div id="fancybox-inner"></div>
                <a id="fancybox-close"></a>
                <a href="javascript:;" id="fancybox-left">
                    <span class="fancy-ico" id="fancybox-left-ico"></span></a>
                <a href="javascript:;" id="fancybox-right">
                    <span class="fancy-ico" id="fancybox-right-ico"></span>
                </a>
            </div>
        </div>
    </body>
</html>