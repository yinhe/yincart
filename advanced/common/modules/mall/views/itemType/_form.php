<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'item-type-form',
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
        <?php echo $form->labelEx($model,'name', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'name', array('class' => 'span5', 'maxlength' => 100)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>
    </div>
    
    <div class="control-group">
        <?php echo $form->labelEx($model,'enabled', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropdownList($model,'enabled', $model->attrEnabled()); ?>
            <?php echo $form->error($model,'enabled'); ?>
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
