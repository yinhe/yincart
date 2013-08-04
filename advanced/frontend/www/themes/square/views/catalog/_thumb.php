<div class="col-span-2">
<div class="thumbnail" style="background:#efefef">
    <?php echo CHtml::link($data->getMainPic('250', '250'), $data->getUrl()) ?>
    <div class="caption" style="text-align:center">
	<p class="title"><?php echo $data->getTitle() ?></p>
	<p><span class="currency"><?php echo $data->currency ?></span><em><?php echo $data->shop_price ?></em></p>
	<p style="text-align:center"><a href="#" class="btn btn-danger">购买</a> <a href="#" class="btn btn-success">收藏</a></p>
    </div>
</div>
</div>