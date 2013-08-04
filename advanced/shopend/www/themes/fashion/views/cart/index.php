<?php
$this->breadcrumbs=array(
	'Shopping Cart',
);
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#updateCart").click(function (event) {
            $('#cartForm').submit(); 
        });
    });
</script>
<div class="box">
    <h3>Shopping Cart</h3>
    <div class="box-content cart">
        <?php echo CHtml::beginForm(array('/cart/update'), 'POST', array('id'=>'cartForm')) ?>
        <table width="100%" border="1" cellspacing="1" cellpadding="0" style="text-align:center;vertical-align:middle">
            <tr>
                <th width="16%">picture</th>
                <th width="16%">sn</th>
                <th width="16%">title</th>
                <th width="16%">qty</th>
                <th width="16%">subtotal</th>
                <th width="16%">action</th>
            </tr>
            <?php
//            print_r($mycart);
            if($mycart){
                $i=1;
            foreach($mycart as $m){?>
            <tr>
                <td><?php echo CHtml::hiddenField($i.'[rowid]', $m['rowid']) ?><?php echo $m['pic_url'] ?></td>
                <td><?php echo $m['sn'] ?></td>
                <td><?php echo $m['title'] ?></td>
                <td><?php echo CHtml::textField($i.'[qty]', $m['qty'], array('size' => '4', 'maxlength' => '5')) ?></td>
                <td>$<?php echo $m['subtotal'] ?></td>
                <td><?php echo CHtml::link('remove', array('/cart/delete', 'rowid'=>$m['rowid']))?></td>
            </tr>
            <?php 
            $i++;
            }
            
            }else{
            ?>
             <tr>
                 <td colspan="6" style="padding:10px">Your shoppingcart is empty!</td>
             </tr>
             <?php } ?>
             <tr>
                 <td colspan="6" style="padding:10px;text-align:right">Total：$<?php echo $total ?></td>
             </tr>
            <tr>
                <td colspan="6" style="vertical-align:middle"><span style="float:left;padding:5px 10px;"><?php echo CHtml::link('empty', array('/cart/destory'), array('class'=>'btn'))?></span>
        <span style="float:right;padding:5px 10px;"><?php echo CHtml::link('continue', array('/item/index'), array('class'=>'btn'))?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="float:right;padding:5px 10px;"><?php echo CHtml::link('update', '#', array('id'=>'updateCart', 'class'=>'btn'))?></span></td>
            </tr>
            <tr>
                 <td colspan="6"><span style="float:right;padding:5px 10px;"><?php echo CHtml::link('checkout', array('/order/checkout'), array('class'=>'btn'))?></span></td>
             </tr>
        </table>
         <?php echo CHtml::endForm(); ?>
    </div>
</div>