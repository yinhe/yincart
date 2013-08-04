<?php
$this->breadcrumbs = array(
    '购物车',
);
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<script type="text/javascript">
    $(document).ready(function() {
	$("#updateCart").click(function(event) {
	    $('#cartForm').submit();
	});
    });
</script>

<?php echo CHtml::beginForm(array('/cart/update'), 'POST', array('id' => 'cartForm')) ?>
<div class="block btn-group block">
    <div class="table-cell">
        <button class="btn btn-small reload-white-large background-color-5"></button>
    </div>
    <div class="table-cell full-width">
        <button class="btn btn-large cursor-default background-color-5">购物车</button>
    </div>
    <div class="table-cell">
        <button class="btn btn-small no-border background-color-5 three-white-bars"></button>
    </div>
</div>
<table class="table-dark background-color-2">
    <thead class="light-text background-color-6">
	<tr>
	    <th class="text-center">编号</th>
	    <th class="text-center">图片</th>
	    <th class="text-center">名称</th>
	    <th class="text-center">数量</th>
	    <th class="text-center">小计</th>
	    <th class="text-center">操作</th>
	</tr>
    </thead>
    <tbody>
	<?php
//            print_r($mycart);
	if ($mycart) {
	    $i = 1;
	    foreach ($mycart as $m) {
		?>
		<tr>
		    <td class="text-center"  style='width:150px;'><?php echo $m['sn'] ?></td>
		    <td class="text-center"  style='width:150px;'><?php echo CHtml::hiddenField($i . '[rowid]', $m['rowid']) ?><?php echo $m['pic_url'] ?></td>
		    <td class="text-center"><?php echo $m['title'] ?></td>
		    <td class="text-center" style='width:150px;'>
			<input type="number" value="<?php echo $m['qty'] ?>" name='<?php echo $i . '[qty]' ?>' style='border-color:#5999a8;color:#fff;background-color:#28555b;margin-top:5px'>
		    </td>
		    <td class="text-center"  style='width:150px;'><?php echo $m['subtotal'] ?>元</td>
		    <td class="text-center"  style='width:150px;'><?php echo CHtml::link('移除', array('/cart/delete', 'rowid' => $m['rowid'])) ?></td>
		</tr>
		<?php
		$i++;
	    }
	} else {
	    ?>
    	<tr>
    	    <td colspan="6" class="text-center">您的购物车是空的!</td>
    	</tr>
	<?php } ?>
	<tr>
	    <td colspan="6" class="text-right">总计：<?php echo $total ?> 元</td>
	</tr>
	<tr>
	    <td colspan="6"><?php echo CHtml::link('清空购物车', array('/cart/destory'), array('class' => 'btn btn-danger no-border')) ?>
		<span style="float:right;padding:5px 10px;"><?php echo CHtml::link('继续购物', array('/item-list-all'), array('class' => 'btn btn-primary no-border')) ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
		<span style="float:right;padding:5px 10px;"><?php echo CHtml::link('更新购物车', '#', array('id' => 'updateCart', 'class' => 'btn btn-info no-border')) ?></span></td>
	</tr>
	<tr>
	    <td colspan="6"><span style="float:right;padding:5px 10px;"><?php echo CHtml::link('结算', array('/order/checkout'), array('class' => 'btn btn-success no-border')) ?></span></td>
	</tr>
    </tbody>
</table>

<?php echo CHtml::endForm(); ?>