<?php
$this->pageTitle = Yii::app()->name . ' - 商品列表';
$this->breadcrumbs = array(
    '商品列表'=>array('/item/list')
);
?>

<?php foreach($categories as $category){?>
<div class="box">
    <div class="box-title"><?php echo $category->category_name ?></div>
    <div class="box-content item-list" style="width:956px">
        <ul>
        <?php 
        $ids = $category->getMeChildsId($category->category_id);
        $cid = implode(',', $ids);
        $criteria = new CDbCriteria(array(
                    'condition' => 'category_id in (' . $cid . ')'
                ));
        $items = Item::model()->findAll($criteria);
        if($items){
        foreach($items as $i){
        ?>
                    <li>
                        <div class="image"><?php echo $i->getListThumb() ?></div>
                        <div class="name"><?php echo CHtml::link($i->item_name, array('/item/view', 'id'=>$i->item_id)) ?></div>
                        <div class="price">零售价：<span class="currency"><?php echo $i->currency ?></span><em><?php echo $i->market_price ?></em></div>
                        <div class="price">批发价：<span class="currency"><?php echo $i->currency ?></span><em><?php echo $i->shop_price ?></em></div>
                    </li>
        <?php 
        }}else{
            ?>
        <p style="text-align:center">没有找到商品!</p>
        <?php } ?>
        </ul>
    </div>
</div>
<?php } ?>