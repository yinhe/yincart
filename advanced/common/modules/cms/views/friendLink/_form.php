<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'friend-link-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

        <?php echo $form->dropDownListRow($model,'category_id', $model->attrCategory(107)); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->fileFieldRow($model,'pic'); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>200, 'hint'=>'请直接输入域名地址，比如：http://yincart.com')); ?>

        <?php echo $form->dropDownListRow($model,'language', array('zh_cn' => '中文', 'en_us' => 'English')); ?>

	<?php echo $form->textAreaRow($model,'memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'sort_order',array('class'=>'span1')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
