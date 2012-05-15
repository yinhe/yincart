<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orders-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_sn'); ?>
		<?php echo $form->textField($model,'order_sn',array('size'=>20,'maxlength'=>20, 'readonly'=>'true')); ?>
		<?php echo $form->error($model,'order_sn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id', array('readonly'=>'true')); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'postcode'); ?>
		<?php echo $form->textField($model,'postcode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'postcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_no'); ?>
		<?php echo $form->textField($model,'tel_no',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tel_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->