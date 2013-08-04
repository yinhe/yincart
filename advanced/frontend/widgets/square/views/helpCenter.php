<div class="col-span-2">
    <h1 class="big">FX</h1>
</div>
<?php foreach($this->getHelp() as $k=>$h){
        ?>
<div class="col-span-2">
                    <h5 class="big"><?php echo $h->name ?></h5>
                        <ul class="listing listing-justified">
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
    <?php }?>
<div class="col-span-2">
    <h5 class="big">联系我们</h5>
    Email:yhxxlm@gmail.com
</div>