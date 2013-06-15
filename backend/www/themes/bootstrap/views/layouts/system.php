<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="row">
    <div class="span2">
        <?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array_merge(array(
        array('label'=>'MAIN MENU'),
        array('label'=>'控制面板', 'icon'=>'home', 'url'=>array('/site/index')),
        '---',
        array('label'=>'菜单管理', 'icon'=>'list', 'url'=>array('/menu/admin')),
        array('label'=>'分类管理', 'icon'=>'leaf', 'url'=>array('/category/admin')),
        array('label' => '配置管理', 'icon'=>'cog', 'url'=>array('/settings')),
        '---',
        array('label'=>'CHILD MENU'),
        ),$this->menu),
)); ?>
    </div>
    <div class="span10">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>