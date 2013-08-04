<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'store_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

			<?php echo $form->textFieldRow($model,'domain',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'type',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'years',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'theme',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'start_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'end_time',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'introduction',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

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
