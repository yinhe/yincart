<section id="content" class="clearfix">
    <!-- Begin slider -->
    <div class="span12">
        <div class="flexslider-container">
            <div class="flexslider">
                <ul class="slides">
                    <?php
                    $ad_list = Ad::model()->findAll();
                    foreach ($ad_list as $k => $a) {
                        ?>
                        <li style="width: 100%; float: left; margin-right: -100%; <?php $k == 0 ? 'display: none;' : 'display: list-item;' ?>">
                            <?php echo CHtml::link(CHtml::image('http://img.'.F::sg('site', 'domain').'/ad/' . $a->pic), $a->url) ?>
                        </li>

                    <?php } ?>
                </ul>
                <div class="flex-controls"><ul class="flex-direction-nav" style="display: block; opacity: 0.897472176693755;"><li><a class="prev" href="http://minimal-jewelry.myshopify.com/#">Previous</a></li><li><a class="next" href="http://minimal-jewelry.myshopify.com/#">Next</a></li></ul></div>
            </div>
        </div>
    </div>
    <!-- End slider -->
    <!-- Begin intro -->
    <div class="span12 p20">
        <div class="intro clearfix">
            <h2>About Us</h2>
            <h3><p><?php echo F::sg('site', 'about'); ?><?php echo CHtml::link('more...', array('/page/index', 'key' => 'about')) ?></p>
            </h3>
        </div>
    </div>
    <!-- End intro -->
    <div class="products">
        <?php
        foreach ($best_items as $b) {
            ?>
            <div class="product span4">
                <?php if ($b->is_promote == 1) { ?>
                    <span class="circle sale">Sale</span>
                <?php } ?>
                <div class="image">
                    <?php echo CHtml::link($b->getMainPic(), $b->getUrl()) ?>
                </div>
                <div class="details">
                    <a href="<?php echo $b->getUrl() ?>" class="clearfix">
                        <h4 class="title"><?php echo $b->getTitle() ?></h4>
                        <!--<span class="vendor">PolaTC</span>-->
                        <span class="price">
                            <?php if ($b->is_promote == 1) { ?>
                                <del><?php echo $b->currency . $b->market_price ?></del>
                            <?php } ?>
                            <?php echo $b->currency . $b->shop_price ?>
                        </span>
                    </a>
                </div>
            </div>
        <?php } ?>
        <div style="clear:both;"></div>
    </div>
</section>