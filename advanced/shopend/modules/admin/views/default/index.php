<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">店铺管理</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge">14</span>
                        订单
                    </li>
                    <li class="list-group-item">
                        <span class="badge">14</span>
                        客户
                    </li>
                    <li class="list-group-item">
                        折扣
                    </li>
                    <li class="list-group-item">
                        <?php echo CHtml::link('商品', array('/admin/item/list'))?>
                    </li>
                    <li class="list-group-item">
                        收藏
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">网站管理</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        帖子
                    </li>
                    <li class="list-group-item">
                        单页
                    </li>
                    <li class="list-group-item">
                        导航
                    </li>
                    <li class="list-group-item">
                        皮肤
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">商店设置</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge">14</span>
                        应用管理
                    </li>
                    <li class="list-group-item">
                        站点设置
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
