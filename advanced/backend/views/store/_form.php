<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'store-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'domain',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->dropDownListRow($model,'type', array('0'=>'入门型', '1'=>'基础型', '2'=>'拓展型', '3'=>'旗舰型'), array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'years', array('1'=>'1', '2'=>'2', '3'=>'3'), array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'theme',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textAreaRow($model,'introduction',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
