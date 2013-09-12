<?php
$this->breadcrumbs=array(
	'Settings'=>array('index'),
	'Settings',
);
?>

<h3>Site Settings</h3>
<p class="help-block">配置完毕，请清理缓存才会生效</p>
<?php echo CHtml::link('清理后台缓存', array('clear')).'&nbsp;&nbsp;&nbsp;&nbsp;'.
	CHtml::link('清理前台缓存', 'http://'.F::sg('site', 'frontDomain').'/site/clear').'&nbsp;&nbsp;&nbsp;&nbsp;'.
	CHtml::link('清理店铺缓存', 'http://'.F::sg('site', 'shopDomain').'/site/clear')
	?>
<?php echo CHtml::errorSummary($model); ?>
<?php
echo CHtml::beginForm();
?>
<ul class="nav nav-tabs" id="site-settings">
<?php
 
$tabs = array();
$i = 0;
    foreach ($model->attributes as $category => $values):?>
        <li<?php echo !$i?' class="active"':''?>><a href="#<?php echo $category?>" data-toggle="tab"><?php echo ucfirst($category)?></a></li>
    <?php 
    $i ++;
    endforeach;?>
</ul>
    <div class="tab-content">
        <?php 
        $i = 0;
        foreach ($model->attributes as $category => $values):?>
            <div class="tab-pane<?php echo !$i?' active':''?>" id="<?php echo $category?>">
                <?php
                $this->renderPartial(
                        '_'.$category, 
                        array('model' => $model, 'values' => $values, 'category' => $category)
                    );
                ?>
            </div>
        <?php 
        $i ++;
        endforeach;?>
    </div>
<?php
echo CHtml::submitButton('Submit', array('class' => 'btn'));
echo CHtml::endForm();