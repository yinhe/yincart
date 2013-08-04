<?php
$this->breadcrumbs = array(
    '收货地址' => array('list'),
    '管理',
);
$this->menu=array(
	array('label'=>'添加收货地址', 'icon'=>'plus','url'=>array('create')),
);
?>

<div class="nav btn-group background-color-6 block">
    <div class="table-cell">
        <div class="btn btn-small arrow-left-white-large background-color-hover-6"></div>
    </div>
    <div class="table-cell full-width">
        <div class="btn btn-large cursor-default">收货地址</div>
    </div>
    <div class="table-cell">
        <div class="btn btn-small three-white-bars no-border background-color-hover-6"></div>
    </div>
</div>
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'address-result-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'contact_name',
//                'country',
                's.name',
                'c.name',
                'd.name',
                'zipcode',
                'address',
                'mobile_phone',
                array(
                    'name' => 'is_default',
                    'value' => '$data->getDefault()',
                ),
                /*
                  'memo',
                  'create_time',
                  'update_time',
                 */
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                ),
            ),
        ));
        ?>