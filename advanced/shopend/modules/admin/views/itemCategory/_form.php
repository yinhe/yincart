<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'itemCategory-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation'=>false,
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>
<fieldset>
	<div class="control-group"><p class="help-block">带 <span class="required">*</span> 的字段为必填项.</p></div>

    <?php if($model->hasErrors()):?>
    <div class="control-group">
        <?php echo $form->errorSummary($model); ?>
    </div>
    <?php endif;?>
    
    <div class="control-group">
        <?php echo $form->labelEx($model,'node', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            if (!$model->isNewRecord) {
                $category_check = StoreCategory::model()->findByPk($model->id);
                $parent = $category_check->parent()->find();
            }
            echo '<select id="StoreCategory_node" name="StoreCategory[node]">';

            $cri = new CDbCriteria(array(
                'condition'=>'root = 2 AND store_id ='.$_SESSION['store']['store_id'],
                'order'=>'lft'
            ));
            $descendants = StoreCategory::model()->findAll($cri);
            $level = 1;
            foreach ($descendants as $child) {
                $string = '&nbsp;&nbsp;';
                $string .= str_repeat('&nbsp;&nbsp;', 2*($child->level - $level));
            //    if ($child->isLeaf() && !$child->next()->find()) {
            //        $string .= '';
            //    } else {
            //
            //        $string .= '';
            //    }
                $string .= '' . $child->name;
            //		echo $string;
                if (!$model->isNewRecord) {
                    if ($parent->id == $child->id) {
                        $selected = 'selected';

                        echo '<option value="' . $child->id . '" selected="' . $selected . '">' . $string . '</option>';
                    } else {
                        echo '<option value="' . $child->id . '" >' . $string . '</option>';
                    }
                } else {
                    echo '<option value="' . $child->id . '" >' . $string . '</option>';
                }
            }
            echo '</select>';
            ?>
            <?php echo $form->error($model,'node'); ?>
        </div>
    </div>
    
    <div class="control-group">
        <?php echo $form->labelEx($model,'name', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'name', array('class' => 'span5', 'maxlength' => 50)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>
    </div>
    
    <div class="control-group">
        <?php echo $form->labelEx($model,'label', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->radioButtonList($model,'label', $model->attrLabelHtml()); ?>
            <?php echo $form->error($model,'label'); ?>
        </div>
    </div>
    
    <div class="control-group">
        <?php echo $form->labelEx($model,'url', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'url', array('class' => 'span5', 'maxlength' => 255)); ?>
            <?php echo $form->error($model,'url'); ?>
        </div>
    </div>
    
    <div class="control-group">
        <?php echo $form->labelEx($model,'pic', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->fileField($model,'pic'); ?>
            <?php echo $form->error($model,'pic'); ?>
        </div>
    </div>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    )); ?>
</fieldset>
<?php $this->endWidget(); ?>
