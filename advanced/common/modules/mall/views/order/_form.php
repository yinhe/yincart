<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
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
		<?php echo $form->labelEx($model,'order_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'order_id',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'order_id'); ?>
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
		<?php echo $form->labelEx($model,'status', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'status'); ?>
            <?php echo $form->error($model,'status'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'pay_status', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'pay_status'); ?>
            <?php echo $form->error($model,'pay_status'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'ship_status', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'ship_status'); ?>
            <?php echo $form->error($model,'ship_status'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'refund_status', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'refund_status'); ?>
            <?php echo $form->error($model,'refund_status'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'total_fee', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'total_fee',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'total_fee'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'ship_fee', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'ship_fee',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'ship_fee'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'pay_fee', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'pay_fee',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'pay_fee'); ?>
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
		<?php echo $form->labelEx($model,'ship_method', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'ship_method',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'ship_method'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'receiver_name', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'receiver_name',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'receiver_name'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'receiver_country', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'receiver_country',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'receiver_country'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'receiver_state', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'receiver_state',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'receiver_state'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'receiver_city', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'receiver_city',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'receiver_city'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'receiver_district', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'receiver_district',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'receiver_district'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'receiver_address', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'receiver_address',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'receiver_address'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'receiver_zip', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'receiver_zip',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'receiver_zip'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'receiver_mobile', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'receiver_mobile',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'receiver_mobile'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'receiver_phone', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'receiver_phone',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'receiver_phone'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'memo', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textArea($model,'memo',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'memo'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'pay_time', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'pay_time',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'pay_time'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'ship_time', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'ship_time',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'ship_time'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'create_time', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'create_time',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'create_time'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'update_time', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'update_time',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'update_time'); ?>
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