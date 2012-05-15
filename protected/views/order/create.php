<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Orders', 'url'=>array('index')),
	array('label'=>'Manage Orders', 'url'=>array('admin')),
);
?>

<div class="box">
<div class="box-title">创建订单</div>
<div class="box-content cart">
            <?php echo CHtml::beginForm(array('/cart/update'), 'POST') ?>
        <table width="100%" border="1" cellspacing="1" cellpadding="0" style="border:solid 1px #cccccc">
            <tr>
                <th width="20%">图片</th>
                <th width="20%">编号</th>
                <th width="20%">名称</th>
                <th width="20%">数量</th>
                <th width="20%">操作</th>
            </tr>
            <?php
            $cart = Yii::app()->cart;
            $mycart = $cart->contents();
            if($mycart){
                $i=1;
            foreach($mycart as $m){?>
            <tr>
                <td><?php echo CHtml::hiddenField($i.'[rowid]', $m['rowid']) ?><?php echo $m['product_image'] ?></td>
                <td><?php echo $m['product_sn'] ?></td>
                <td><?php echo $m['product_name'] ?></td>
                <td><?php echo CHtml::textField($i.'[qty]', $m['qty'], array('size' => '4', 'maxlength' => '5')) ?></td>
                <td><?php echo CHtml::link('移除', array('/cart/delete', 'rowid'=>$m['rowid']))?></td>
            </tr>
            <?php 
            $i++;
            }
            
            }else{
            ?>
             <tr>
                 <td colspan="5">您的购物车是空的!</td>
             </tr>
             <?php } ?>
            <tr>
                <td colspan="5"><span style="float:left"><?php echo CHtml::link('清空购物车', array('/cart/destory'))?></span>
        <span style="float:right"><?php echo CHtml::submitButton('更新购物车')?></span></td>
            </tr>
        </table>
         <?php echo CHtml::endForm(); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>