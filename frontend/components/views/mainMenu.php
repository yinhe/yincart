<?php 
//$cri = new CDbCriteria(array(
//    'condition'=>'parent_id = 0 and type = "middle"',
//    'order'=>'sort_order asc'
//));
//$models = Menu::model()->findAll($cri);

$menu=Menu::model()->findByPk(4);
$descendants=$menu->children()->findAll();

/*
 * 多级菜单
 */
//foreach($descendants as $model){
//$items[] = $model->getListed();
//}


//$this->widget('application.extensions.mbmenu.MbMenu',array( 
//            'items'=>$items
//)); 
/*
 * 单级菜单
 */
foreach($descendants as $model)
$items[] = array('label'=>$model->name, 'url'=>$model->url ? Yii::app()->request->baseUrl.'/'.$model->url : '#');
//print_r($items);
$this->widget('zii.widgets.CMenu', array(
    'items'=>$items
));
//echo '<ul>';
//foreach($descendants as $model){
//    echo '<li>';
//    echo CHtml::link($model->name, $model->url, array('class'=>'current'));
//    echo '</li>';
//}
//echo '</ul>';