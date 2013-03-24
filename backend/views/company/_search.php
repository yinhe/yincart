<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'com_id'); ?>
		<?php echo $form->textField($model,'com_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_type'); ?>
		<?php echo $form->textField($model,'com_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uid'); ?>
		<?php echo $form->textField($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'province'); ?>
		<?php echo $form->textField($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_name'); ?>
		<?php echo $form->textField($model,'com_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_sn'); ?>
		<?php echo $form->textField($model,'com_sn',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_address'); ?>
		<?php echo $form->textField($model,'com_address',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_logo'); ?>
		<?php echo $form->textField($model,'com_logo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_banner'); ?>
		<?php echo $form->textField($model,'com_banner',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'district'); ?>
		<?php echo $form->textField($model,'district'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_desc'); ?>
		<?php echo $form->textArea($model,'com_desc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contactor'); ?>
		<?php echo $form->textField($model,'contactor',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'office_phone'); ?>
		<?php echo $form->textField($model,'office_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobile_phone'); ?>
		<?php echo $form->textField($model,'mobile_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_time'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_time'); ?>
		<?php echo $form->textField($model,'end_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'commision'); ?>
		<?php echo $form->textField($model,'commision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_details'); ?>
		<?php echo $form->textArea($model,'com_details',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_url'); ?>
		<?php echo $form->textField($model,'com_url',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_time'); ?>
		<?php echo $form->textField($model,'add_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'certified_time'); ?>
		<?php echo $form->textField($model,'certified_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'brand_story'); ?>
		<?php echo $form->textArea($model,'brand_story',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'express'); ?>
		<?php echo $form->textArea($model,'express',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'department'); ?>
		<?php echo $form->textField($model,'department'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee'); ?>
		<?php echo $form->textField($model,'employee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'industry'); ?>
		<?php echo $form->textField($model,'industry'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nature'); ?>
		<?php echo $form->textField($model,'nature'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_brands'); ?>
		<?php echo $form->textArea($model,'com_brands',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->