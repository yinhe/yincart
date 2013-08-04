<div class="help-wrap background-color-0">
    <?php foreach($this->getHelp() as $h){?>
    <div class="btn btn-large btn-text background-color-6 block"><?php echo $h->name ?></div> 
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
    <?php }?>
</div>