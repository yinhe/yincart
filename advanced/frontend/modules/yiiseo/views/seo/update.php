<?php
$this->breadcrumbs=array(
	'Yiiseo Urls'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List YiiseoUrl', 'url'=>array('index')),
	array('label'=>'Create YiiseoUrl', 'url'=>array('create')),
	array('label'=>'View YiiseoUrl', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update YiiseoUrl <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array( 'model'=>$model,
                                                'modelTitle'=>$modelTitle,
                                                "modelKeywords"=>$modelKeywords,
                                                "modelDescription"=>$modelDescription,
                                                "modelOther"=>$modelOther,)); ?>