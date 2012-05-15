<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'com_type'); ?>
		<?php echo $form->textField($model,'com_type'); ?>
		<?php echo $form->error($model,'com_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uid'); ?>
		<?php echo $form->textField($model,'uid'); ?>
		<?php echo $form->error($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country'); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->textField($model,'province'); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city'); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_name'); ?>
		<?php echo $form->textField($model,'com_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'com_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_sn'); ?>
		<?php echo $form->textField($model,'com_sn',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'com_sn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_address'); ?>
		<?php echo $form->textField($model,'com_address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'com_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_logo'); ?>
		<?php echo $form->textField($model,'com_logo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'com_logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_banner'); ?>
		<?php echo $form->textField($model,'com_banner',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'com_banner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'district'); ?>
		<?php echo $form->textField($model,'district'); ?>
		<?php echo $form->error($model,'district'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_desc'); ?>
		<?php echo $form->textArea($model,'com_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'com_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactor'); ?>
		<?php echo $form->textField($model,'contactor',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contactor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'office_phone'); ?>
		<?php echo $form->textField($model,'office_phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'office_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_phone'); ?>
		<?php echo $form->textField($model,'mobile_phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mobile_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_time'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
		<?php echo $form->error($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_time'); ?>
		<?php echo $form->textField($model,'end_time'); ?>
		<?php echo $form->error($model,'end_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'commision'); ?>
		<?php echo $form->textField($model,'commision'); ?>
		<?php echo $form->error($model,'commision'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_details'); ?>
		<?php echo $form->textArea($model,'com_details',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'com_details'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_url'); ?>
		<?php echo $form->textField($model,'com_url',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'com_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_time'); ?>
		<?php echo $form->textField($model,'add_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'add_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'certified_time'); ?>
		<?php echo $form->textField($model,'certified_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'certified_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_story'); ?>
		<?php echo $form->textArea($model,'brand_story',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'brand_story'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'express'); ?>
		<?php echo $form->textArea($model,'express',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'express'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->textField($model,'department'); ?>
		<?php echo $form->error($model,'department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee'); ?>
		<?php echo $form->textField($model,'employee'); ?>
		<?php echo $form->error($model,'employee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'industry'); ?>
		<?php echo $form->textField($model,'industry'); ?>
		<?php echo $form->error($model,'industry'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nature'); ?>
		<?php echo $form->textField($model,'nature'); ?>
		<?php echo $form->error($model,'nature'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_brands'); ?>
		<?php echo $form->textArea($model,'com_brands',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'com_brands'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->