<?php

$this->pageTitle = $model->name . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    '商品列表' => array('/item-list-all'),
    $model->name
);
?>
<div class="col-span-12">
    <div class="nav btn-group background-color-6 block" style="margin-top:20px">
        <div class="table-cell">
            <div class="btn btn-small arrow-left-white-large background-color-hover-6"></div>
        </div>
        <div class="table-cell full-width">
            <div class="btn btn-large cursor-default">商品列表</div>
        </div>
        <div class="table-cell">
            <div class="btn btn-small three-white-bars background-color-hover-6"></div>
        </div>
    </div>
</div>

<div class="col-span-12">
    <div class="item-list">
        <div class="row">
            <?php
            if ($items) {
                foreach ($items as $data): ?>

                    <div class="col-span-2">
                        <div class="thumbnail" style="background:#efefef">
                            <?php echo CHtml::link($data->getMainPic('287', '287'), $data->getUrl()) ?>
                            <div class="caption" style="text-align:center">
                                <p class="title"><?php echo $data->getTitle() ?></p>

                                <p><span
                                        class="currency"><?php echo $data->currency ?></span><em><?php echo $data->shop_price ?></em>
                                </p>

                                <p style="text-align:center"><a href="#" class="btn btn-danger">购买</a> <a href="#"
                                                                                                          class="btn btn-success">收藏</a>
                                </p>
                            </div>
                        </div>
                    </div>

                <?php
                endforeach;
            } else {
                echo '<div style="text-align:center">没有商品！</div>';
            }
            ?>
        </div>
    </div>
</div>