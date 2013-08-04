<?php

$menu = Menu::model()->findByPk(4);
$descendants = $menu->children()->findAll();
 
/*
 * 多级菜单
 */
foreach ($descendants as $model) {
    if ($model->getChildCount() > 0) {
        $items[] = array('label' => F::t($model->name), 'url' => $model->url ? Yii::app()->request->baseUrl . '/' . $model->url : '#',
            'items' => $model->getChildMenu(),
            'itemOptions' => array('class' => 'dropdown'), 'submenuOptions' => array('class' => 'dropdown'));
    } else {
        $items[] = array('label' => F::t($model->name), 'url' => $model->url ? Yii::app()->request->baseUrl . '/' . $model->url : '#');
    }
}
//print_r($items);
$this->widget('zii.widgets.CMenu', array(
    'htmlOptions' => array('class' => 'horizontal fr unstyled clearfix'),
    'items' => $items
));
