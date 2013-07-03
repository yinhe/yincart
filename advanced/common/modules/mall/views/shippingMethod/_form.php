<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shipping-method-form',
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

<!--	<div class="control-group">
		<?php echo $form->labelEx($model,'code', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'code',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'code'); ?>
        </div>
	</div>-->

	<div class="control-group">
		<?php echo $form->labelEx($model,'name', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>120)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'desc', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'desc'); ?>
        </div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'enabled', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model,'enabled', array('1'=>'启用', '0'=>'禁用')); ?>
            <?php echo $form->error($model,'enabled'); ?>
        </div>
	</div>


	<div class="control-group">
		<?php echo $form->labelEx($model,'is_cod', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model,'is_cod', array('1'=>'是', '0'=>'否')); ?>
            <?php echo $form->error($model,'is_cod'); ?>
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