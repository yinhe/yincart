<?php 
$cri = new CDbCriteria(array(
    'condition'=>'parent_id = 0 and type = "middle"',
    'order'=>'sort_order asc'
));
$models = Menu::model()->findAll($cri);

/*
 * 多级菜单
 */
//foreach($models as $model){
//$items[] = $model->getListed();
//}


//$this->widget('application.extensions.mbmenu.MbMenu',array( 
//            'items'=>$items
//)); 
/*
 * 单级菜单
 */
foreach($models as $model){
$items[] = $model->getSingleListed();
}
$this->widget('zii.widgets.CMenu', array(
    'items'=>$items
));
//echo '<ul>';
//foreach($models as $model){
//    echo '<li>';
//    echo CHtml::link($model->name, $model->menu_url, array('class'=>'current'));
//    echo '</li>';
//}
//echo '</ul>';