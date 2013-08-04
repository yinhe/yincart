    <?php foreach($this->getHelp() as $k=>$h){
        ?>
<div class="help<?php echo $k+1 ?>">
                    <div>
                        <div class="box-title"><?php echo $h->name ?></div>
                        <ul>
                            <?php 
    $cri = new CDbCriteria(array(
                    'condition' => 'category_id = '.$h->id,
                ));
    $helpChilds = Page::model()->findAll($cri);
    foreach($helpChilds as $hc){
    ?>
                            <li><?php echo CHtml::link($hc->title, array('/page/index', 'key'=>$hc->key)) ?></li>
                            <?php }?>
                        </ul>					
                    </div>
                </div>
    <?php }?>
<div class="help5">
    <div>
        <div class="box-title">联系我们</div>
        Email:yhxxlm@gmail.com
    </div>
</div>