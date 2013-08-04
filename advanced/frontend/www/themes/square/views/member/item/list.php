<?php
$this->breadcrumbs = array(
    'Item' => array('list'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Item', 'icon' => 'plus', 'url' => array('create')),
);
?>

<div class="nav btn-group background-color-6 block">
    <div class="table-cell">
        <div class="btn btn-small three-white-bars background-color-hover-6"></div>
    </div>
    <div class="table-cell full-width">
        <div class="btn btn-large cursor-default">商品列表</div>
    </div>
</div>
 
<table class="table-dark text-center">
    <thead class="light-text background-color-2">
    <tr>
        <th class='text-center' style='width:150px'>分类</th>
        <th class='text-center' style='width:150px'>类型</th>
	<th class='text-center' style='width:150px'>货号</th>
        <th class='text-center'>标题</th>
	<th class='text-center' style='width:150px'>分销价</th>
	<th class='text-center' style='width:150px'>建议零售价</th>
	<th class='text-center' style='width:150px'>操作</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach($models as $model): ?>
    <tr>
        <td>Dribble.com</td>
        <td>Dribble.com</td>
	<td>Dribble.com</td>
	<td>Dribble.com</td>
	<td>Dribble.com</td>
        <td>Dribble.com</td>
	<td>Dribble.com</td>
    </tr>
    <?php endforeach; ?>


    </tbody>
</table>
<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>

<?php
//$this->widget('bootstrap.widgets.TbGridView', array(
//    'id' => 'item-grid',
//    'dataProvider' => $model->ownerSearch(),
//    'filter' => $model,
//    'columns' => array(
////	'item_id',
//	'category_id',
//	'type_id',
//	'title',
//	'sn',
//	'market_price',
//	'shop_price',
////	'unit',
	/*
	  'stock',
	  'min_number',
	  'market_price',
	  'shop_price',
	  'currency',
	  'skus',
	  'props',
	  'props_name',
	  'item_imgs',
	  'prop_imgs',
	  'pic_url',
	  'desc',
	  'location',
	  'post_fee',
	  'express_fee',
	  'ems_fee',
	  'is_show',
	  'is_promote',
	  'is_new',
	  'is_hot',
	  'is_best',
	  'is_discount',
	  'click_count',
	  'sort_order',
	  'create_time',
	  'update_time',
	  'language',
	 */
//	array(
//	    'class' => 'bootstrap.widgets.TbButtonColumn',
//	),
 //   ),
//));
?>
