<?php
$this->breadcrumbs = array(
    '商品列表' => array('list'),
    '管理',
);

$this->menu = array(
    array('label' => '创建商品', 'icon' => 'plus', 'url' => array('create')),
);
?>

<div class="col-lg-12">
    <table class="table">
        <thead>
        <tr>
            <th style='width:150px'>分类</th>
            <th style='width:300px'>标题</th>
            <th style='width:150px'>分销价</th>
            <th style='width:150px'>建议零售价</th>
            <th style='width:150px'>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($models as $model): ?>
            <tr>
                <td><?php echo $model->category->name ?></td>
                <td><?php echo $model->title ?></td>
                <td><?php echo $model->shop_price ?></td>
                <td><?php echo $model->market_price ?></td>
                <td><?php echo CHtml::link('编辑', array('/admin/item/update', 'id' => $model->item_id)); ?>|删除</td>
            </tr>
        <?php endforeach; ?>


        </tbody>
    </table>
    <?php $this->widget('CLinkPager', array(
        'pages' => $pages,
//        'htmlOptions' => array('class'=>'pagination', 'style'=>'text-align:center')
    )) ?>
</div>