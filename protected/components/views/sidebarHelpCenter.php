<div class="TreeList">
    <?php foreach($this->getHelp() as $h){?>
    <div class="cat1"><?php echo $h->category_name ?></div> 
    <?php 
    $cri = new CDbCriteria(array(
                    'condition' => 'cate_id = '.$h->category_id,
                ));
    $helpChilds = Page::model()->findAll($cri);
    foreach($helpChilds as $hc){
    ?>
    <div class="cat2"><?php echo CHtml::link($hc->title, array('/page/index', 'key'=>$hc->key)) ?></div> 
    <?php }?>
    <?php }?>
</div>