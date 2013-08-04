<?php
$action = item;
Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '"', CClientScript::POS_HEAD);
//    Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '&id=' . $id . '"', CClientScript::POS_HEAD);
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'item-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
//    'type' => 'horizontal',
        ));
?>
<div class='item-form background-color-0'>
    
<p class="text-danger" style='padding:10px 0 0 20px'>带 <span class="required">*</span> 的字段为必填项.</p>

<?php

$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs',
    'placement' => 'above', // 'above', 'right', 'below' or 'left'
    'htmlOptions' => array('class'=>'background-color-6'),
    'tabs' => array(
        array('label' => '基本信息', 'content' => $this->renderPartial("_form_base", array('model' => $model, 'form'=>$form), true), 'active' => true),
        array('label' => '详细描述', 'content' => $this->renderPartial("_form_desc", array("model" => $model, 'form'=>$form), true)),
        array('label' => '其他信息', 'content' => $this->renderPartial("_form_other", array("model" => $model, 'form'=>$form), true)),
        array('label' => '商品类型', 'content' => $this->renderPartial("_form_type", array("model" => $model, 'form'=>$form), true)),
        array('label' => '商品图片', 'content' => $this->renderPartial("_form_image", array('model' => $model, 'form'=>$form), true)),
    ),
));
?>

<div class="control-group">
		    <div class="controls">
			<button class="btn btn-large background-color-2" type='submit'>保存</button>
		    </div>
		</div>
<?php $this->endWidget(); ?>
<div>
