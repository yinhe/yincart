<?php
$this->breadcrumbs = array(
    '我的订单' => array('list'),
    '管理',
);
?>

<div class="nav btn-group background-color-6 block">
    <div class="table-cell">
        <div class="btn btn-small arrow-left-white-large background-color-hover-6"></div>
    </div>
    <div class="table-cell full-width">
        <div class="btn btn-large cursor-default">订单列表</div>
    </div>
    <div class="table-cell">
        <div class="btn btn-small three-white-bars no-border background-color-hover-6"></div>
    </div>
</div>
<?php foreach($models as $model): ?>
<table class="table-dark">
    <thead class="dark-text background-color-2">
    <tr>
        <th colspan='9'>订单号：<?php echo $model->order_id ?> 成交时间：<?php echo F::date($model->create_time)?></th>
    </tr>
    </thead>
    <tbody>
    <tr class='background-color-000'>
	<td>Dribble.com1</td><!--图片-->
	<td>Dribble.com2</td><!--名称属性-->
	<td>Dribble.com3</td><!--单价-->
	<td>Dribble.com4</td><!--数量-->
	<td>Dribble.com5</td><!--售后投诉-->
	<td>Dribble.com6</td><!--总价（含快递）-->
        <td>Dribble.com7</td><!--交易状态/订单详情/查看物流-->
        <td>Dribble.com8</td><!--评价-->
	<td>Dribble.com9</td><!--删除/备忘/转发-->
    </tr>
    </tbody>
</table>
<?php endforeach; ?>

<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>

           
        <?php
//        $this->widget('zii.widgets.grid.CGridView', array(
//            'id' => 'order-grid',
//            'dataProvider' => $model->ownerSearch(),
//            'filter' => $model,
//	    'hideHeader' => true,
//	    'htmlOptions'=>array('class'=>'table-dark table-bordered background-color-2'),
//            'columns' => array(
//                'order_id',
//                'status',
//                'pay_status',
//                'ship_status',
//                'total_fee',
//                'ship_fee',
//                'pay_fee',
                /*
                  'pay_method',
                  'ship_method',
                  'receiver_name',
                  'receiver_country',
                  'receiver_state',
                  'receiver_city',
                  'receiver_district',
                  'receiver_address',
                  'receiver_zip',
                  'receiver_mobile',
                  'receiver_phone',
                  'memo',
                  'pay_time',
                  'ship_time',
                  'create_time',
                  'update_time',
                 */
//                array(
//                    'class' => 'bootstrap.widgets.TbButtonColumn',
//                ),
//            ),
//        ));
        ?>