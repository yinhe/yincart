<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'link_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'pic',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textAreaRow($model,'memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'sort_order',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'language',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'update_time',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
