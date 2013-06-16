<?php
$this->breadcrumbs=array(
	'Yiiseo Urls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List YiiseoUrl', 'url'=>array('index')),
);
?>

<h1>Create YiiseoUrl</h1>

<?php echo $this->renderPartial('_form', array( 'model'=>$model,
                                                'modelTitle'=>$modelTitle,
                                                "modelKeywords"=>$modelKeywords,
                                                "modelDescription"=>$modelDescription)); ?>