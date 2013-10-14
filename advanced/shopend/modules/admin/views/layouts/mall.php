<?php $this->beginContent('admin.views.layouts.main'); ?>
    <div id="siderbar-nav">
        <?php
        $this->widget('bootstrap.widgets.TbNav', array(
            'type' => TbHtml::NAV_TYPE_LIST,
            'items' =>  array_merge(array(
                array('label' => 'Your Store'),
                array('label'=>'商品分类', 'url'=>array('/admin/itemCategory/admin'), 'icon' => 'bookmark'),
                array('label'=>'商品列表', 'url'=>array('/admin/item/list'), 'icon' => 'list'),
                TbHtml::menuDivider(),
                array('label' => 'CHILD MENU'),
            ), $this->menu),
        ));
        ?>
    </div>

    <div id="siderbar-content">
        <div class="row-fluid">
            <div class="span12">
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                'homeUrl'=>array('/admin'),
                'links' => $this->breadcrumbs
            )); ?><!-- breadcrumbs -->
                <?php endif ?>
                <?php echo $content; ?>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>