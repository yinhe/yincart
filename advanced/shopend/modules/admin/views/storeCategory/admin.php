<?php
/* @var $this StoreCategoryController */
/* @var $model StoreCategory */

$this->breadcrumbs=array(
	'店铺分类'=>array('admin'),
	'管理',
);

$this->menu=array(
	array('label'=>'创建分类', 'url'=>array('create'), 'icon'=>'plus'),
);

?>
<div class="well">
    <?php
    $criteria = new CDbCriteria;
    $criteria->condition = 'store_id ='.$_SESSION['store']['store_id'];
    $criteria->order = 't.root, t.lft'; // or 't.root, t.lft' for multiple trees
    $categories = StoreCategory::model()->findAll($criteria);
    $level = 0;

    foreach ($categories as $n => $category) {
        if ($category->level == $level)
            echo CHtml::closeTag('li') . "\n";
        else if ($category->level > $level)
            echo CHtml::openTag('ul') . "\n";
        else {
            echo CHtml::closeTag('li') . "\n";

            for ($i = $level - $category->level; $i; $i--) {
                echo CHtml::closeTag('ul') . "\n";
                echo CHtml::closeTag('li') . "\n";
            }
        }

        echo CHtml::openTag('li');
        echo CHtml::encode($category->name).'<span style="float:right">['.
            CHtml::link('更新', array('/admin/storeCategory/update', 'id'=>$category->id)).']['.
            CHtml::link('删除', '', array('submit'=>array('/admin/storeCategory/delete','id'=>$category->id),'style'=>'cursor:pointer', 'confirm'=>'Are you sure you want to delete this item?')).']</span>';
        $level = $category->level;
    }

    for ($i = $level; $i; $i--) {
        echo CHtml::closeTag('li') . "\n";
        echo CHtml::closeTag('ul') . "\n";
    }

    ?>
</div>
</div>

