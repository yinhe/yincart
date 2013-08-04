<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <h1>Hello, world!</h1>
    <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
    <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
</div>

<div class="row">
<?php 
$cri = new CDbCriteria(array(
    'condition'=>'store_id ='.$_SESSION['store']['store_id'],
));
$item = Item::model()->findAll($cri);
foreach ($item as $i){?>

  <div class="col-lg-3" style="margin-bottom:20px;">
    <div class="thumbnail" style="background:#efefef">
      <?php echo CHtml::link($i->getMainPic('260px', '260px'), $i->getUrl()) ?>
      <div class="caption" style="text-align:center">
        <h3><?php echo $i->title ?></h3>
        <p><del><?php echo $i->currency.$i->market_price ?></del><?php echo $i->currency.$i->shop_price ?></p>
        <p><a href="#" class="btn btn-primary">购买</a> <a href="#" class="btn btn-default">收藏</a></p>
      </div>
    </div>
  </div>

    <?php }
//echo Yii::app()->F->hello;
?>
</div>