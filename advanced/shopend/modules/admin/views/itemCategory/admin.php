<?php
$this->breadcrumbs = array(
    '商品分类' => array('admin'),
    '管理',
);

$this->menu = array(
    array('label' => '创建分类', 'icon' => 'plus', 'url' => array('create')),
);
?>

<h1>管理分类</h1>

<div class="well well-large">
    <?php
    $descendants = StoreCategory::model()->findAll(array('condition' => 'root=2', 'order' => 'lft'));
    $level = 0;

    foreach ($descendants as $category) {
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
	if ($category->id != 2) {
	    echo CHtml::encode($category->name) . $category->getLabel() . '<span style="float:right;">[' .
	    CHtml::link('更新', array('/mall/itemCategory/update', 'id' => $category->id)) . '][' .
	    CHtml::link('删除', '', array('submit' => array('/mall/itemCategory/delete', 'id' => $category->id), 'style' => 'cursor:pointer', 'confirm' => 'Are you sure you want to delete this item?')) . ']</span>';
	} else {
	    echo CHtml::encode($category->name) . $category->getLabel() . '<span style="float:right;">[' .
	    CHtml::link('更新', array('/mall/itemCategory/update', 'id' => $category->id)) . ']</span>';
	}
	$level = $category->level;
    }

    for ($i = $level; $i; $i--) {
	echo CHtml::closeTag('li') . "\n";
	echo CHtml::closeTag('ul') . "\n";
    }
    ?>
</div>
