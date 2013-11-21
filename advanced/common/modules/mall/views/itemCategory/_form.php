<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'category-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
)); ?>

<div class="control-group"><p class="help-block">带 <span class="required">*</span> 的字段为必填项.</p></div>

<?php if ($model->hasErrors()): ?>
    <div class="control-group">
        <?php echo $form->errorSummary($model); ?>
    </div>
<?php endif; ?>

<div class="control-group">
    <?php echo $form->labelEx($model, 'node', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php
        $parent_id = 0;
        if (!$model->isNewRecord) {
            $node = Category::model()->findByPk($model->id);
            $parent = $node->parent()->find();
            $parent_id = $parent->id;
        }
        $descendants = Category::model()->findAll(array('condition' => 'root=3', 'order' => 'lft'));
        $data = Category::model()->getSelectOptions($descendants);
        echo CHtml::dropDownList('Category[node]', $parent_id, $data);
        ?>
        <?php echo $form->error($model, 'node'); ?>
    </div>
</div>

<?php echo $form->textFieldRow($model, 'name'); ?>
<?php echo $form->radioButtonListRow($model, 'label', $model->attrLabelHtml(), array('labelOptions' => array('class' => 'radio inline'))); ?>
<?php echo $form->textFieldRow($model, 'url'); ?>
<?php echo $form->fileFieldRow($model, 'pic'); ?>

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
