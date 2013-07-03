<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'newsletter-subscriber-form',
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
		<?php echo $form->labelEx($model,'customer_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'customer_id', array('class'=>'span5','maxlength'=>10)); ?>
            <?php echo $form->error($model,'customer_id'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'email', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'email', array('class'=>'span5','maxlength'=>150)); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'status', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model,'status', array('1'=>'是', '0'=>'否')); ?>
            <?php echo $form->error($model,'status'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'confirm_code', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'confirm_code', array('class'=>'span5','maxlength'=>32)); ?>
            <?php echo $form->error($model,'confirm_code'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'change_status_at', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'change_status_at', array('class'=>'span5')); ?>
            <?php echo $form->error($model,'change_status_at'); ?>
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
