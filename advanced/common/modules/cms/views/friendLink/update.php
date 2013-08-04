<?php
$this->breadcrumbs = array(
    '友情链接' => array('admin'),
    $model->title => array('view', 'id' => $model->link_id),
    '更新',
);

$this->menu = array(
    array('label' => '创建链接', 'icon' => 'plus', 'url' => array('create')),
    array('label' => '查看链接', 'icon' => 'eye-open', 'url' => array('view', 'id' => $model->link_id)),
    array('label' => '管理链接', 'icon' => 'cog', 'url' => array('admin')),
);
?>

<h1>更新链接 <?php echo $model->link_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>