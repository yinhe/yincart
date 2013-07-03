<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payment-form',
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
		<?php echo $form->labelEx($model,'pay_sn', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'pay_sn',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'pay_sn'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'money', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'money',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'money'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'currency', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'currency',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'currency'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'order_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'order_id',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'order_id'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'pay_method', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'pay_method',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'pay_method'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'user_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'user_id'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'account', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'account',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'account'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'bank', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'bank',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'bank'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'pay_account', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'pay_account',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'pay_account'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'status', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'status',array('size'=>8,'maxlength'=>8)); ?>
            <?php echo $form->error($model,'status'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'create_time', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'create_time',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'create_time'); ?>
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