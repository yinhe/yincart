<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'customer-service-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
        ));
?>

    <div class="control-group"><p class="help-block">带 <span class="required">*</span> 的字段为必填项.</p></div>

    <?php if($model->hasErrors()):?>
    <div class="control-group">
        <?php echo $form->errorSummary($model); ?>
    </div>
    <?php endif;?>

    <div class="control-group">
        <?php echo $form->labelEx($model,'category_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model,'category_id', $model->attrCategory(104)); ?>
            <?php echo $form->error($model,'category_id'); ?>
        </div>
    </div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'type', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model,'type', $model->attrType()); ?>
            <?php echo $form->error($model,'type'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'nick_name', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'nick_name', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model,'nick_name'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'account', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'account', array('size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model,'account'); ?>
        </div>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'is_show', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model,'is_show', $model->attrShow()); ?>
            <?php echo $form->error($model,'is_show'); ?>
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
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? 'Create' : 'Save',
        ));
        ?>
    </div>

<?php $this->endWidget(); ?>