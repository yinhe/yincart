<?php
$this->pageTitle=Yii::app()->name . ' - 会员店铺展示';
$this->breadcrumbs = array(
    '会员店铺展示',
);
?>

<div class="box">
    <div class="box-title">会员店铺展示</div>
    <div class="box-content">
        <ul class="case_list">
        <?php foreach ($case as $c) {?>
            <li><h4><?php echo CHtml::link($c->title, $c->url) ?></h4>
                <a target="_blank" title="<?php echo $c->title ?>" href="<?php echo $c->url ?>">
                    <?php echo $c->getThumb() ?>
                </a>
            </li>
        <?php } ?>
        </ul>
    </div>
</div>

<div class="clear"></div>