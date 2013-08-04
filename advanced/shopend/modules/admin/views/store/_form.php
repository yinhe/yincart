<?php
/* @var $this StoreController */
/* @var $model Store */
/* @var $form TbActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'store-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'store_id',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'user_id',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>100)); ?>

	<?php echo $form->textFieldControlGroup($model,'domain',array('span'=>5,'maxlength'=>200)); ?>

	<?php echo $form->textFieldControlGroup($model,'type',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'years',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'theme',array('span'=>5,'maxlength'=>50)); ?>

	<?php echo $form->textFieldControlGroup($model,'start_time',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'end_time',array('span'=>5)); ?>

	<?php echo $form->textAreaControlGroup($model,'introduction',array('rows'=>6,'span'=>8)); ?>

	<?php echo $form->textFieldControlGroup($model,'create_time',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'update_time',array('span'=>5)); ?>

	<div class="form-actions">
		<?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->