<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/jquery.treeview.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.cookie.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.treeview.js');
?>
<script type="text/javascript">

    $(document).ready(function(){
	
        // second example
        $("#navigation").treeview({
            persist: "location",
            collapsed: true,
            unique: true
        });
	
    });
</script>
<div style="margin:0 auto;font-size:14px;font-weight:bold;padding-left:40px">
<ul id="navigation">
        <?php foreach ($this->getCat() as $c) { ?>
        <li class="open">
            <?php echo CHtml::link($c->cate_name, Yii::app()->createUrl('/product/index', array('cate_id' => $c->cate_id))) ?>
            <?php if ($c->getChildCount() > 0) { ?>
                <ul>
                    <?php
                    $cri = new CDbCriteria(array(
                                'condition' => 'parent_id =' . $c->cate_id
                            ));
                    $childs = Pcat::model()->findAll($cri);
                    foreach ($childs as $cc) {
                        ?>
                        <li class="open"><?php echo CHtml::link($cc->cate_name, $cc->url ? $cc->url : Yii::app()->createUrl('/product/index', array('cate_id' => $cc->cate_id))) ?>
                            <?php if ($cc->getChildCount() > 0) { ?>
                                <ul>
                                    <?php
                                    $cri = new CDbCriteria(array(
                                                'condition' => 'parent_id =' . $cc->cate_id
                                            ));
                                    $childss = Pcat::model()->findAll($cri);
                                    foreach ($childss as $ccc) {
                                        ?>
                                        <li class="open"><?php echo CHtml::link($ccc->cate_name, $ccc->url ? $ccc->url : Yii::app()->createUrl('/product/index', array('cate_id' => $ccc->cate_id))) ?></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?> 
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </li>
    <?php } ?>
</ul>
</div>