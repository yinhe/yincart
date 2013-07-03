<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'friend-link-form',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
)); ?>

	<div class="control-group"><p class="help-block">带 <span class="required">*</span> 的字段为必填项.</p></div>

	<?php if($model->hasErrors()):?>
    <div class="control-group">
        <?php echo $form->errorSummary($model); ?>
    </div>
    <?php endif;?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>
	</div>
        
    <div class="control-group">
		<?php echo $form->labelEx($model,'image', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->fileField($model,'image'); ?>
            <?php echo $form->error($model,'image'); ?>
        </div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'website', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>200)); ?>
            <?php echo $form->error($model,'website'); ?>
        </div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'sort_order', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'sort_order'); ?>
            <?php echo $form->error($model,'sort_order'); ?>
        </div>
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