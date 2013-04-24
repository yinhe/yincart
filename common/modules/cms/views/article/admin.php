<?php
$this->breadcrumbs=array(
	'文章'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'创建文章', 'icon'=>'plus','url'=>array('create')),
);
?>
<?php
//$db1 = Yii::app()->db2->createCommand('select cid,title,content,addtime from cms_news')->queryAll();
//
////var_dump($db1);
//
//foreach($db1 as $d1){
//    $id = $d1['cid'];
//    $title = $d1['title'];
//    $content = $d1['content'];
//    $addtime = strtotime($d1['addtime']);
////    Yii::app()->db->createCommand("insert into cms_article(category_id,title,content,create_time) VALUES ('".$id."', '".$title."', '".$content."', '".$addtime."')")->query();
//}

?>
<h1>管理文章</h1>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'article_id',
//		'category.name',
//		'author.username',
		'title',
		'from',
//                'language',
		/*
		'views',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>