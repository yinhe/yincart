<?php
$this->pageTitle = $model->category_name . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    '商品列表'=>array('/item/list'),
    $model->category_name
);
?>

<?php echo $model->getThumb() ?>
<div class="box" style="margin-top:10px">
    <div class="box-title">热卖商品</div>
    <div class="box-content item-list">
            <?php
            if ($hotItems) {
                echo '<ul>';
                foreach ($hotItems as $hi) {
                    ?>
                    <li>
                        <div class="image"><?php echo $hi->getListThumb() ?></div>
                        <div class="name"><?php echo CHtml::link($hi->item_name, array('/item/view', 'id'=>$hi->item_id)) ?></div>
                        <div class="price">零售价：<span class="currency"><?php echo $hi->currency ?></span><em><?php echo $hi->market_price ?></em></div>
                        <div class="price">批发价：<span class="currency"><?php echo $hi->currency ?></span><em><?php echo $hi->shop_price ?></em></div>
                    </li>
                <?php
                }
                echo '</ul>';
            } else {
                ?>
                <div style="text-align:center">没有找到热卖商品!</div>
<?php } ?>
    </div>
</div>

<div class="clear"></div>

<div class="box" style="margin-top:10px">
    <div class="box-title"><?php //echo $model->category_name ?>商品列表</div>
    <div class="box-content item-list">
            <?php

            if ($items) {
                echo '<ul>';
                foreach ($items as $i) {
                    ?>
                    <li>
                        <div class="image"><?php echo $i->getListThumb() ?></div>
                        <div class="name"><?php echo CHtml::link($i->item_name, array('/item/view', 'id'=>$i->item_id)) ?></div>
                        <div class="price">零售价：<span class="currency"><?php echo $i->currency ?></span><em><?php echo $i->market_price ?></em></div>
                        <div class="price">批发价：<span class="currency"><?php echo $i->currency ?></span><em><?php echo $i->shop_price ?></em></div>
                    </li>
                <?php
                }
                echo '</ul>';
            } else {
                ?>
                <div style="text-align:center">没有找到商品!</div>
<?php } ?>
    </div>
    <div class="clear"></div>
    <div align="center" class="p-page"><?php
$this->widget('CLinkPager', array(
    'pages' => $pages,
))
?>
    </div>

</div>
