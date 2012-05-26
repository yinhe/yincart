<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'brand-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_name'); ?>
		<?php echo $form->textField($model,'brand_name',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'brand_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_logo'); ?>
		<?php echo $form->fileField($model,'brand_logo',array('size'=>20,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'brand_logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_desc'); ?>
		<?php echo $form->textArea($model,'brand_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'brand_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_url'); ?>
		<?php echo $form->textField($model,'site_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'site_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_show'); ?>
		<?php echo $form->dropDownList($model,'is_show', array('1' => '是', '0' => '否')); ?>
		<?php echo $form->error($model,'is_show'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->