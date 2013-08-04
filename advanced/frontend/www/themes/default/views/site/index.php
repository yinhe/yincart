<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<div class="main-content">
    <div class="row"> 
        <div class="span3 catalog">
            <?php $this->widget('widgets.default.WCatalog') ?>
        </div>

        <div class="span6">
            <?php $this->widget('widgets.default.WAd'); ?>
        </div>
        <div class="span3">
            <div class="well well-small">
                <div class="box-title">供应信息</div>
                <div class="box-content">
                    <ul>
                        <li>供应项链100条</li>
                        <li>供应项链100条</li>
                        <li>供应项链100条</li>
                    </ul>
                </div>
            </div>
            <div class="well well-small">
                <div class="box-title">求购信息</div>
                <div class="box-content">
                    <ul>
                        <li>求购箱包100个</li>
                        <li>求购箱包100个</li>
                        <li>求购箱包100个</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="row">
        <div class="span12">
            <?php
            $category = Category::model()->findByPk(3);
            $categories = $category->children()->findAll();
            foreach ($categories as $c) {
                ?>
                <div class="well">
                    <div class="box-title"><?php echo $c->name ?></div>
                    <div class="box-content">

                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>


</div>