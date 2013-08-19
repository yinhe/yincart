<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kefu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', array('1'=>'QQ', '2'=>'阿里旺旺')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nick_name'); ?>
		<?php echo $form->textField($model,'nick_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nick_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'account'); ?>
		<?php echo $form->textField($model,'account',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'account'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'if_show'); ?>
		<?php echo $form->dropDownList($model,'if_show', array('1'=>'是', '0'=>'否')); ?>
		<?php echo $form->error($model,'if_show'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->