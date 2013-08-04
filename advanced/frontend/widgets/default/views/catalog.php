<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-vertical-mega-menu/js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-vertical-mega-menu/js/jquery.dcverticalmegamenu.1.3.js'></script>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-vertical-mega-menu/css/dcverticalmegamenu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    $(document).ready(function($) {
        $('#mega-1').dcVerticalMegaMenu({
            rowItems: '3',
            speed: 'fast',
            effect: 'show',
            direction: 'right'
        });
    });
</script>
<ul id="mega-1" class="mega-menu">
    <?php foreach ($parents as $p) { ?>
        <li><?php echo CHtml::link($p->name, Yii::app()->request->baseUrl . '/catalog/' . $p->url) ?>
            <ul style="margin-left:0 !important;z-index:999">
                <?php
                $category = Category::model()->findByPk($p->id);
                $childs = $category->children()->findAll();
                foreach ($childs as $c) {
                    ?>
                    <li><?php echo CHtml::link($c->name, Yii::app()->request->baseUrl . '/catalog/' . $c->url) ?>
                        <ul style="margin-left:0 !important;z-index:999"><li><a href="#">Menu Link</a></li>
                            <li><a href="#">Menu Link</a></li>
                            <li><a href="#">Menu Link</a></li>
                            <li><a href="#">Menu Link</a></li>
                        </ul>
                    </li>
                <?php } ?> 
            </ul>
        </li>
    <?php } ?> 
</ul>