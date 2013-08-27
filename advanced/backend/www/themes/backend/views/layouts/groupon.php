<?php /* @var $this Controller */ ?>
<?php 
    $script = Yii::app()->clientScript;
    $script->registerCssFile("/js/facebox/facebox.css");
    $script->registerscriptFile('/js/facebox/facebox.js');
?>
<?php $this->beginContent('//layouts/main'); ?>
<?php $this->renderPartial('//layouts/_alert');?>
<div class="row">
    <div class="span2">
        <?php
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type' => 'list',
            'items' => array_merge(array(
                array('label' => 'MAIN MENU'),
                array('label' => '控制面板', 'icon' => 'home', 'url' => array('/site/index')),
                '---',
                array('label' => 'GROUPON'),
                array('label' => '我的团购', 'icon' => 'bookmark', 'url' => array('/groupon/sellgroupon/index')),
                array('label' => '添加团购', 'icon' => 'bookmark', 'url' => array('/groupon/sellgroupon/create')),
                '---',
                array('label' => 'BIZ'),
                array('label' => '我的商家', 'icon' => 'bookmark', 'url' => array('/groupon/sellbiz/index')),
                array('label' => '添加商家', 'icon' => 'bookmark', 'url' => array('/groupon/sellbiz/create')),
                array('label' => '商家分店列表', 'icon' => 'bookmark', 'url' => array('/groupon/sellshop/index')),
                '---',
                array('label' => 'CHILD MENU'),
                    ), $this->menu),
        ));
        ?>
    </div>
    <div class="span10">
        <div id="content">
<?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>