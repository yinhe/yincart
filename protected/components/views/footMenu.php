<?php

foreach ($this->getFootMenu() as $fm) {
    echo CHtml::link($fm->name, array($fm->menu_url)) . '&nbsp;|&nbsp;';
}
?>