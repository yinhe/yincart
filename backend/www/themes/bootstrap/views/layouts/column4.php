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
        array('label'=>'会员列表', 'icon'=>'user', 'url'=>array('/user/admin/admin')),
        array('label'=>'管理员列表', 'icon'=>'cog', 'url'=>array('/adminUser/admin')),
        array('label'=>'权限控制', 'icon'=>'fire', 'url'=>array('/auth/assignment/index')),
        array('label'=>'开发进度', 'icon'=>'fire', 'url'=>array('/adminTask/admin')),
        '---',
        array('label'=>'商家列表', 'icon'=>'user', 'url'=>array('/biz/bizInfo/admin')),
        array('label'=>'商家店面', 'icon'=>'cog', 'url'=>array('/biz/bizStore/admin')),
        array('label'=>'商家相册', 'icon'=>'fire', 'url'=>array('/biz/bizAlbum/admin')),
        array('label'=>'优惠券', 'icon'=>'fire', 'url'=>array('/biz/bizcoupon/admin')),
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