<section id="content" class="clearfix">
    <div id="collection">
        <!-- Begin collection info -->
        <div class="row">
            <div class="span12">
                <!-- Begin breadcrumb -->
                <div class="breadcrumb clearfix">
                    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="<?php echo Yii::app()->createUrl('/site/index')?>" title="Minimal Jewelry Theme" itemprop="url"><span itemprop="title">Home</span></a>
                    </span> 
                    <span class="arrow-space">&gt;</span>
                    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="<?php echo Yii::app()->createUrl('/item/index')?>" title="All Products" itemprop="url">
                            <span itemprop="title">All Products</span>
                        </a>
                    </span>       
                    <span class="arrow-space">&gt;</span> 
                    <strong><?php echo ucwords($key) ?></strong>
                </div>
                <!-- End breadcrumb -->

                <!-- Begin sort collection -->
                <div class="clearfix">
                    <h1 class="collection-title"><?php echo ucwords($key) ?></h1>
<!--                    <div class="browse-tags">
                        <label>Browse:</label>
                        <select name="collection_tags" id="collection_tags" class="loc_on_change">
                            <option value="/collections/all-products">All items</option>
                        </select>
                    </div>-->
                </div>
                <!-- End sort collection -->
                <!-- Begin collection description -->
                <!-- End collection description -->
            </div>
        </div>
        <!-- End collection info -->
        <!-- Begin no products -->

        <div class="row products">
            <?php foreach ($items as $i) { ?>
                <div class="product span4">
                    <?php if ($i->is_promote == 1) { ?>
                        <span class="circle sale">Sale</span>
                    <?php } ?>
                    <div class="image">
                        <?php echo CHtml::link($i->getMainPic(), $i->getUrl()) ?>
                    </div>
                    <div class="details">
                        <a href="<?php echo $i->getUrl() ?>" class="clearfix">
                            <h4 class="title"><?php echo $i->getTitle() ?></h4>
                            <!--<span class="vendor">PolaTC</span>-->
                            <span class="price">
                                <?php if ($i->is_promote == 1) { ?>
                                <del><?php echo $i->currency . $i->market_price ?></del>
                                <?php } ?>
                                <?php echo $i->currency . $i->shop_price ?>
                            </span>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <div style="clear:both;"></div>
        </div>

        <div class="row">
            <div class="span12" style="text-align:center">
<!--                <ul class="pagination clearfix">
                    <li><span></span></li>
                    <li>Page 1 of 4</li>
                    <li><a href="http://minimal-jewelry.myshopify.com/collections/all-products?page=2" class="next">Next</a></li>
                </ul>-->
                <?php
                $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'header' => FALSE,
                    'htmlOptions' => array(
                        'class'=>'pagination clearfix'
                    )
                ))
                ?>
            </div>
        </div> 

        <!-- End no products -->

    </div>
</section>