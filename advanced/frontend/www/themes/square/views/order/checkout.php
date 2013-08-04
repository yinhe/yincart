<?php
$this->breadcrumbs = array(
    '购物车' => array('/cart'),
    '确认订单'
);
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<script type="text/javascript">
    $(document).ready(function() {
	$("#confirmOrder").click(function(event) {
	    $('#orderForm').submit();
	});
    });

</script>
<?php echo CHtml::beginForm(array('/order/create'), 'POST', array('id' => 'orderForm')) ?>

<div class="nav btn-group background-color-5">
    <div class="table-cell">
        <div class="btn btn-small three-white-bars background-color-hover-6"></div>
    </div>
    <div class="table-cell full-width">
        <div class="btn btn-large cursor-default text-left">收货地址</div>
    </div>
    <div class="table-cell">
        <div class="btn btn-large cursor-default link-column"><?php echo CHtml::link('管理收货地址', array('/member/delivery_address/list'), array('class' => 'dark-text')) ?></div>
    </div>
</div>

<div class="checkout-address-content background-color-0">
    <span class="radio-wrapper">
	<?php
	$cri = new CDbCriteria(array(
	    'condition' => 'user_id = ' . Yii::app()->user->id
	));
	$AddressResult = AddressResult::model()->findAll($cri);
	if ($AddressResult) {
	    foreach ($AddressResult as $address) {
		$default_address = $address->is_default == 1 ? 'default_address' : '';
		echo "<div style='float:left'>";
		echo CHtml::radioButton('delivery_address', $address->is_default == 1 ? TRUE : FALSE, array('value' => $address->contact_id, 'id' => 'radio-' . $address->contact_id));
		echo CHtml::tag('label', array(
		    'for' => 'radio-' . $address->contact_id));
		echo '</div>';
		echo "<div style='float:left;padding-left:10px'>".$address->s->name . '&nbsp;' . $address->c->name . '&nbsp;' . $address->d->name . '&nbsp;' . $address->address . '&nbsp;(' . $address->contact_name . '&nbsp;收)&nbsp;' . $address->mobile_phone."</div>";
	        echo "<div class='clearfix'></div>";
		}
	} else {
	    ?>
	    <?php echo CHtml::link('添加收货地址', array('/member/delivery_address/create')) ?>    
	<?php } ?>
    </span>
</div>
<div class="nav btn-group background-color-5">
    <div class="table-cell">
        <div class="btn btn-small three-white-bars background-color-hover-6"></div>
    </div>
    <div class="table-cell full-width">
        <div class="btn btn-large cursor-default text-left">支付方式</div>
    </div>
</div>
<div class="checkout-payment-content background-color-0">
    <?php
    $cri = new CDbCriteria(array(
	'condition' => 'enabled = 1'
    ));
    $paymentMethod = PaymentMethod::model()->findAll($cri);
    $list = CHtml::listData($paymentMethod, 'id', 'name');
    echo CHtml::radioButtonList('pay_method', '1', $list);
    ?>
</div>
<div class="nav btn-group background-color-5">
    <div class="table-cell">
        <div class="btn btn-small three-white-bars background-color-hover-6"></div>
    </div>
    <div class="table-cell full-width">
        <div class="btn btn-large cursor-default text-left">购物车</div>
    </div>
</div>
<table class="table-dark background-color-2">
    <thead class="light-text background-color-6">
	<tr>
	    <th class="text-center" style='width:150px'>编号</th>
	    <th class="text-center" style='width:150px'>图片</th>
	    <th class="text-center">名称</th>
	    <th class="text-center" style='width:150px'>数量</th>
	    <th class="text-center" style='width:150px'>小计</th>
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
		    <td class="text-center"><?php echo CHtml::hiddenField('order[' . $i . '][sn]', $m['sn']) ?><?php echo $m['sn'] ?></td>
		    <td class="text-center"><?php echo CHtml::hiddenField('order[' . $i . '][rowid]', $m['rowid']) ?><?php echo $m['pic_url'] ?></td>
		    <td class="text-center"><?php echo CHtml::hiddenField('order[' . $i . '][title]', $m['title']) ?><?php echo $m['title'] ?></td>
		    <td class="text-center"><?php echo CHtml::hiddenField('order[' . $i . '][qty]', $m['qty']) ?><?php echo $m['qty'] ?></td>
		    <td class="text-center"><?php echo CHtml::hiddenField('order[' . $i . '][subtotal]', $m['subtotal']) ?><?php echo $m['subtotal'] ?>元</td>
		</tr>
		<?php
		$i++;
	    }
	} else {
	    ?>
    	<tr>
    	    <td colspan="5" class="text-center background-color-0">您的购物车是空的!</td>
    	</tr>
	<?php } ?>
	<tr>
	    <td colspan="5" class="text-right background-color-0">总计：<?php echo CHtml::hiddenField('pay_fee', $total) ?><?php echo $total ?> 元</td>
	</tr>
    </tbody>
</table>

<div class='row'>
    <div class="order-checkout-memo">
	<div class="col-span-10 checkout-memo text-left">
	    <h3>给卖家留言：</h3>
	    <?php echo CHtml::textArea('memo', '', array('placeholder' => '选填，可以告诉卖家您对商品的特殊要求，如：颜色、尺码等', 'class' => '')); ?>
	</div>
	<div class="col-span-2 express text-left">
	    <h3>配送方式：</h3>
	    <span class="select-wrapper">
		<?php
		$cri = new CDbCriteria(array(
		    'condition' => 'enabled = 1'
		));
		$shippingMethod = ShippingMethod::model()->findAll($cri);
		$list = CHtml::listData($shippingMethod, 'id', 'name');
		echo CHtml::dropDownList('ship_method', '', $list);
		?>

<!--	    <select>
	<option value="classic" selected="">Classic</option>
	<option value="classically">Classically</option>
	<option value="classicalest">Classicalest</option>
    </select>-->
	    </span>
	</div>
    </div>
</div>
<div class="clearfix"></div>
<div class="order-confirm text-right" style='margin-top:10px'><?php echo CHtml::link('确认订单', '#', array('id' => 'confirmOrder', 'class' => 'btn btn-success no-border')) ?></div>


<?php echo CHtml::endForm() ?>