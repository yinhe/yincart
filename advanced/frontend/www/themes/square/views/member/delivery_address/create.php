<?php
$this->breadcrumbs = array(
    '收货地址' => array('list'),
    '添加',
);
$this->menu = array(
    array('label' => '管理地址', 'icon' => 'cog', 'url' => array('list')),
);
?>

<h3>添加收货地址</h3>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>