<?php
$this->breadcrumbs = array(
    '收货地址' => array('list'),
    '详细地址#' . $model->contact_id,
);

$this->menu = array(
    array('label' => '创建地址', 'icon' => 'plus', 'url' => array('create')),
    array('label' => '更新地址', 'icon' => 'pencil', 'url' => array('update', 'id' => $model->contact_id)),
    array('label' => '删除地址', 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->contact_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => '管理地址', 'icon' => 'cog', 'url' => array('list')),
);
?>

<h3>查看收货地址#<?php echo $model->contact_id; ?></h3>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'contact_id',
        'user_id',
        'contact_name',
//		'country',
        's.name',
        'c.name',
        'd.name',
        'zipcode',
        'address',
        'phone',
        'mobile_phone',
        'memo',
        'is_default',
        'create_time',
        'update_time',
    ),
));
?>