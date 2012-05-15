    <?php foreach($this->getHelp() as $k=>$h){
        ?>
<div class="help<?php echo $k+1 ?>">
                    <div>
                        <h3><?php echo $h->category_name ?></h3>
                        <ul>
                            <?php 
    $cri = new CDbCriteria(array(
                    'condition' => 'cate_id = '.$h->category_id,
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