<?php
$this->breadcrumbs = array(
    '单页' => array('index'),
    '管理',
);

$this->menu = array(
    array('label' => '创建单页', 'icon' => 'plus', 'url' => array('create')),
);
?>

<h1>单页管理</h1>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'page-grid',
    'dataProvider' => $model->storeSearch(),
    'filter' => $model,
    'columns' => array(
        'category.name',
        'key',
        'title',
        'language',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
//            'template' => '{view}{update}{delete}',
//            'viewButtonUrl' => 'Yii::app()->createUrl("/page/index",
//			array("key" => $data->key))',
        ),
    ),
));
?>