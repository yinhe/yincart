<?php
/* @var $this StoreCategory1Controller */
/* @var $model StoreCategory */
/* @var $form CActiveForm */
?>

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'store-category-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'enableAjaxValidation'=>false,
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    )); ?>
    <fieldset>
        <div class="control-group">
            <p class="note">Fields with <span class="required">*</span> are required.</p>
            <?php echo CHtml::errorSummary($model, '请更正以下错误：', NULL, array('class' => 'text-danger')); ?>
    </div>

        <div class="control-group">
        <label class="control-label required">分类 <span class="required">*</span></label>

            <div class="controls">
            <?php
            if (!$model->isNewRecord) {
                $category_check = StoreCategory::model()->findByPk($model->id);
                $parent = $category_check->parent()->find();
            }
            echo '<select id="StoreCategory_node" name="StoreCategory[node]" class="form-control">';
            $cri = new CDbCriteria(array(
                'condition' => 'store_id ='.$_SESSION['store']['store_id']
            ));
            $categories = StoreCategory::model()->roots()->findAll($cri);
            $level = 1;
            echo '<option value="0">请选择分类</option>';
            foreach ($categories as $n => $category) {
                if (!$model->isNewRecord) {
                    if ($parent->id == $category->id) {
                        $selected = 'selected';
                        echo '<option value="' . $category->id . '" selected="' . $selected . '">' . $category->name . '</option>';
                    } else {
                        echo '<option value="' . $category->id . '">' . $category->name . '</option>';
                    }
                } else {
                    echo '<option value="' . $category->id . '">' . $category->name . '</option>';
                }

                $children = $category->descendants()->findAll();
                foreach ($children as $child) {
                    $string = '&nbsp;&nbsp;';
                    $string .= str_repeat('│&nbsp;&nbsp;', $child->level - $level - 1);
                    if ($child->isLeaf() && !$child->next()->find()) {
                        $string .= '└';
                    } else {

                        $string .= '├';
                    }
                    $string .= '─' . $child->name;
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
            }
            echo '</select>';
            ?>
        </div>
    </div>

            <?php echo $form->textFieldControlGroup($model, 'name', array('span' => 5)); ?>
            <?php echo $form->radioButtonListControlGroup($model,'label', $model->attrLabelHtml()); ?>
            <?php echo $form->textFieldControlGroup($model, 'url', array('class' => 'form-control')); ?>
            <?php echo $form->fileFieldControlGroup($model, 'pic', array('help'=>'分类图片文件上传')); ?>
            <?php echo $form->textFieldControlGroup($model, 'position', array('class' => 'form-control')); ?>
            <?php echo $form->dropDownListControlGroup($model, 'if_show', array('1' => '是', '0' => '否'), array('class' => 'form-control')); ?>
            <?php echo $form->textAreaControlGroup($model, 'memo', array('span'=>8, 'rows' => 3)); ?>

        <?php echo TbHtml::formActions(array(
            TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::resetButton('Reset'),
        )); ?>
</fieldset>
    <?php $this->endWidget(); ?>


