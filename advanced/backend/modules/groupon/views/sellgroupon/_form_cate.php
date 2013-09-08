<?php echo $form->dropDownListRow($model, 'cate_1_id',  ARCates::getCates(),array(
    'class'=>'span2',
    'prompt'=>'请选择',
    'ajax'=>array(
        'type'=>'POST',
        'url'=>$this->createUrl('ajax/cate'),
        'success'=>'function(data){
            $("#ARGroupon_cate_2_id").html(data);
            $("#ARGroupon_cate_3_id").html("<option value=\"\">请选择</option>");
        }',
        'data'=>array(Yii::app()->request->csrfTokenName=>Yii::app()->request->getCsrfToken(),'pid'=>'js:$("#ARGroupon_cate_1_id").val()','level'=>  ARCates::LEVEL_TWO),
    ),
))?>

<?php echo $form->dropDownListRow($model, 'cate_2_id', $model->cate_1_id>0?ARCates::getCates($model->cate_1_id, ARCates::LEVEL_TWO):array(), array(
    'class'=>'span2',
    'prompt'=>'请选择',
    'ajax'=>array(
        'type'=>'POST',
        'url'=>$this->createUrl('ajax/cate'),
        'update'=>'#ARGroupon_cate_3_id',
        'data'=>array(Yii::app()->request->csrfTokenName=>Yii::app()->request->getCsrfToken(),'pid'=>'js:$("#ARGroupon_cate_2_id").val()','level'=>  ARCates::LEVEL_THREE),
    ),
))?>

<?php echo $form->dropDownListRow($model, 'cate_3_id', $model->cate_2_id>0?ARCates::getCates($model->cate_2_id, ARCates::LEVEL_THREE):array(),array('class'=>'span2','prompt'=>'请选择'))?>

