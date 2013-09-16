<?php
$props = CJSON::decode($model->props, TRUE);
//print_r($props);
echo '<div class="item-props"><ul>';
foreach($props as $k=>$v){
    $p_list = ItemProp::model()->findByPk($k);

    if($p_list->type == 'optional') {
        $new_v = explode(':', $v);
        $new_value = $new_v[1];
        $v_list = PropValue::model()->findByPk($new_value);
        echo '<li class="col-span-3">'.$p_list->prop_name.':'.$v_list->value_name.'</li>';
    }elseif($p_list->type == 'input') {
        echo '<li class="col-span-3">'.$p_list->prop_name.':'.$v.'</li>';
    }elseif($p_list->type == 'multiCheck') {
        echo '<li class="col-span-3">'.$p_list->prop_name.':';
        foreach($v as $key=>$value){
            $new_v = explode(':', $value);
            $new_value = $new_v[1];
            $v_list = PropValue::model()->findByPk($new_value);
            echo $v_list->value_name.',';
        }
        echo '</li>';
    }
}
echo '</ul></div>';
echo '<div class="clearfix"></div>';
echo $model->desc;
