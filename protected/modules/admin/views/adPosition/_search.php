<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'position_id'); ?>
		<?php echo $form->textField($model,'position_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'position_name'); ?>
		<?php echo $form->textField($model,'position_name',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_width'); ?>
		<?php echo $form->textField($model,'ad_width'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_height'); ?>
		<?php echo $form->textField($model,'ad_height'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'position_desc'); ?>
		<?php echo $form->textField($model,'position_desc',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'position_style'); ?>
		<?php echo $form->textArea($model,'position_style',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->