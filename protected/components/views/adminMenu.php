<?php 
$cri = new CDbCriteria(array(
    'condition'=>'parent_id = 0 and type = "admin"',
    'order'=>'sort_order asc'
));
$models = Menu::model()->findAll($cri);

foreach($models as $model){
$items[] = $model->getListed();
}


$this->widget('application.extensions.mbmenu.MbMenu',array( 
            'items'=>$items
)); 