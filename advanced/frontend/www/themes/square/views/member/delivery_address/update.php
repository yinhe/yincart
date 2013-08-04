<?php
$this->breadcrumbs = array(
    '收货地址' => array('list'),
    '详细地址#' . $model->contact_id => array('view', 'id' => $model->contact_id),
    '更新',
);

$this->menu = array(
    array('label' => '创建地址', 'icon' => 'plus', 'url' => array('create')),
    array('label' => '查看地址', 'icon' => 'eye-open', 'url' => array('view', 'id' => $model->contact_id)),
    array('label' => '地址列表', 'icon' => 'cog', 'url' => array('list')),
);
?>

<h3>更新收货地址#<?php echo $model->contact_id; ?></h3>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>