<?php

foreach ($this->getFootMenu() as $fm) {
    echo '<li>'.CHtml::link($fm->name, $fm->url ? Yii::app()->request->baseUrl.'/'.$fm->url : '#').'</li>';
}
?>