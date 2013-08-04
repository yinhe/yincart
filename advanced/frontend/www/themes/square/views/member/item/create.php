<?php
$this->breadcrumbs=array(
	'Work'=>array('list'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Work','icon'=>'cog','url'=>array('list')),
);
?>

<div class="nav btn-group background-color-6 block">
    <div class="table-cell">
        <div class="btn btn-small arrow-left-white-large background-color-hover-6"></div>
    </div>
    <div class="table-cell full-width">
        <div class="btn btn-large cursor-default">创建商品</div>
    </div>
    <div class="table-cell">
        <div class="btn btn-small three-white-bars background-color-hover-6"></div>
    </div>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>