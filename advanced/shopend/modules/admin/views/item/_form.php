<?php
$action = 'item';
$base_url = 'http://img.' . F::sg('site', 'domain');
$id = $_SESSION['store']['store_id'];
$type = 'store';
Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '&base_url=' . $base_url . '&id=' . $id . '&type=' . $type . '"', CClientScript::POS_HEAD);
//    Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '&id=' . $id . '"', CClientScript::POS_HEAD);
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'item-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal'),
//    'type' => 'horizontal',
	));
?>
<div class='item-form'>

    <p class="text-danger" style='padding:10px 0 0 20px'>带 <span class="required">*</span> 的字段为必填项.</p>

    <?php
    $this->widget('zii.widgets.jui.CJuiTabs', array(
	'htmlOptions' => array('class' => 'nav nav-tabs'),
	'tabs' => array(
	    '基本信息' => $this->renderPartial("_form_base", array('model' => $model, 'form' => $form), true),
	    '详细描述' => $this->renderPartial("_form_desc", array("model" => $model, 'form' => $form, 'action' => $action, 'base_url' => $base_url, 'id' => $id, 'type' => $type), true),
	    '其他信息' => $this->renderPartial("_form_other", array("model" => $model, 'form' => $form), true),
	    '商品类型' => $this->renderPartial("_form_type", array("model" => $model, 'form' => $form), true),
	    '商品图片' => $this->renderPartial("_form_image", array('image' => $image, 'form' => $form, 'upload' => $upload, 'id'=>$id, 'item'=>$model), true),
	),
    ));
    ?>

    <div class="col-lg-10 col-offset-2" style="margin-top:20px">
	<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存', array('class'=>'btn btn-default')); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>
