<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pinpai-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pp_name'); ?>
		<?php echo $form->textField($model,'pp_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'pp_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->