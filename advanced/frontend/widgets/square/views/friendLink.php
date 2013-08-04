<?php
$category = Category::model()->findByPk(107);
$childs = $category->children()->findAll();
foreach ($childs as $child) :
?>
<div class="row">
<div class="col-span-12 friend-link">
    <ul>
	<li><?php echo $child->name  ?></li>
	<?php 
	$cri = new CDbCriteria(array(
	    'condition'=>'category_id = '.$child->id,
	    'order'=>'link_id asc, sort_order asc'
	));
	$links = FriendLink::model()->findAll($cri);
	foreach ($links as $l) :?>
	<li><?php echo CHtml::link($l->title, $l->url, array('target' => '_blank')) ?></li>
	<?php endforeach; ?>
    </ul>
</div>
</div>
<?php endforeach; ?>