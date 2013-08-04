<?php
$this->breadcrumbs = array(
    '商品列表' => array('list'),
    '管理',
);

$this->menu = array(
    array('label' => '创建商品', 'icon' => 'plus', 'url' => array('create')),
);
?>

<div id="loading-header">
    <div class="header-row">
	    <header>
                <h3 class="header-main"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;商品列表
		<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo CHtml::link('创建商品', array('create')) ?>
		</h3>
	    </header>
    </div> <!-- /.header-row -->
</div>
<div class="col-lg-12 main-content">

 
<table class="table">
    <thead>
    <tr>
        <th style='width:150px'>分类</th>
        <th style='width:150px'>类型</th>
	<th style='width:150px'>货号</th>
        <th>标题</th>
	<th style='width:150px'>分销价</th>
	<th style='width:150px'>建议零售价</th>
	<th style='width:150px'>操作</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach($models as $model): ?>
    <tr>
        <td><?php echo $model->category->name ?></td>
        <td><?php echo $model->type->name ?></td>
	<td><?php echo $model->sn ?></td>
	<td><?php echo $model->title ?></td>
	<td><?php echo $model->shop_price ?></td>
        <td><?php echo $model->market_price ?></td>
	<td><?php echo CHtml::link('编辑', array('/admin/item/update', 'id'=>$model->item_id));?>|删除</td>
    </tr>
    <?php endforeach; ?>


    </tbody>
</table>
<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>
</div>
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
