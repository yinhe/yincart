<?php
$this->breadcrumbs=array(
	'购物车'=>array('/cart'),
        '确认订单' 
);
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#confirmOrder").click(function (event) {
            $('#orderForm').submit(); 
        });
    });
</script>
<?php echo CHtml::beginForm(array('/order/create'), 'POST', array('id'=>'orderForm')) ?>
<div class="box">
    <div class="box-title">收货地址</div>
    <div class="box-content">
        
    </div>
</div>
<div class="box">
    <div class="box-title">支付方式</div>
    <div class="box-content">
        
    </div>
</div>
<div class="box">
    <div class="box-title">购物车</div>
    <div class="box-content cart">
        
        <table width="100%" border="1" cellspacing="1" cellpadding="0" style="text-align:center;vertical-align:middle">
            <tr>
                <th width="20%">图片</th>
                <th width="20%">编号</th>
                <th width="20%">名称</th>
                <th width="20%">数量</th>
                <th width="20%">小计</th>
            </tr>
            <?php
//            print_r($mycart);
            if($mycart){
                $i=1;
            foreach($mycart as $m){?>
            <tr>
                <td><?php echo CHtml::hiddenField($i.'[rowid]', $m['rowid']) ?><?php echo $m['item_image'] ?></td>
                <td><?php echo $m['item_sn'] ?></td>
                <td><?php echo $m['item_name'] ?></td>
                <td><?php echo $m['qty'] ?></td>
                <td><?php echo $m['subtotal'] ?>元</td>
            </tr>
            <?php 
            $i++;
            }
            
            }else{
            ?>
             <tr>
                 <td colspan="5" style="padding:10px">您的购物车是空的!</td>
             </tr>
             <?php } ?>
             <tr>
                 <td colspan="5" style="padding:10px;text-align:right">总计：<?php echo $total ?> 元</td>
             </tr>
        </table>
    </div>
    </div>
    <div class="order-confirm"><span style="float:right;padding:5px 10px;"><?php echo CHtml::link('确认订单', '#', array('id'=>'confirmOrder', 'class'=>'btn1'))?></span></div>
    

<?php echo CHtml::endForm() ?>