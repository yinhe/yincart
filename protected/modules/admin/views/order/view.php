<?php
$this->breadcrumbs = array(
    'Orders' => array('index'),
    $model->order_id,
);

$this->menu = array(
    array('label' => 'List Orders', 'url' => array('index')),
    array('label' => 'Create Orders', 'url' => array('create')),
    array('label' => 'Update Orders', 'url' => array('update', 'id' => $model->order_id)),
    array('label' => 'Delete Orders', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->order_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Orders', 'url' => array('admin')),
);
?>

<div class="box">
    <div class="box-title">查看订单</div>
    <div class="box-content">

        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'attributes' => array(
                'order_id',
                'order_sn',
                'user_id',
                'user_name',
                'email',
                'address',
                'postcode',
                'tel_no',
                'content',
            ),
        ));
        ?>
    </div>
</div>
<div class="box">
    <div class="box-title">订购产品</div>
    <div class="box-content cart">
        <table width="100%" border="1" cellspacing="1" cellpadding="0" style="border:solid 1px #cccccc">
            <tr>
                <th width="20%">图片</th>
                <th width="20%">编号</th>
                <th width="20%">名称</th>
                <th width="20%">数量</th>
            </tr>
            <?php
            $products = $model->goods;
            foreach ($products as $m) {
                ?>
                <tr>
                    <td><?php echo unserialize($m['product_image']) ?></td>
                    <td><?php echo $m['product_sn'] ?></td>
                    <td><?php echo $m['product_name'] ?></td>
                    <td><?php echo $m['qty'] ?></td>
                </tr>

                <?php
            }
            ?>
        </table>
    </div>
</div>