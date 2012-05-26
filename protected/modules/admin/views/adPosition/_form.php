<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-position-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'position_name'); ?>
		<?php echo $form->textField($model,'position_name',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'position_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_width'); ?>
		<?php echo $form->textField($model,'ad_width').'像素'; ?>
		<?php echo $form->error($model,'ad_width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_height'); ?>
		<?php echo $form->textField($model,'ad_height').'像素'; ?>
		<?php echo $form->error($model,'ad_height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position_desc'); ?>
		<?php echo $form->textField($model,'position_desc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'position_desc'); ?>
	</div>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'position_style'); ?>
		<?php echo $form->textArea($model,'position_style',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'position_style'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->