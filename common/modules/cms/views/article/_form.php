<?php
/** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'article-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<legend><?php echo $action_text ?></legend>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>



<?php echo $form->errorSummary($model); ?>

  <div class="control-group ">
        <label for="Article_category_id" class="control-label required">文章分类 <span class="required">*</span></label>
        <div class="controls">
            <?php
            
            echo '<select id="Article_category_id" name="Article[category_id]">';
            $category = Category::model()->findByPk(5);
            $descendants = $category->descendants()->findAll();
            $level = 3;

            echo '<option value="0" >请选择分类</option>';
            foreach ($descendants as $child) {
                $string = '&nbsp;&nbsp;';
                $string .= str_repeat('&nbsp;&nbsp;', $child->level - $level);
                if ($child->isLeaf() && !$child->next()->find()) {
                    $string .= '';
                } else {

                    $string .= '';
                }
                $string .= '' . $child->name;
//		echo $string;
                if (!$model->isNewRecord) {
                    if ($model->category_id == $child->id) {
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
        </div>
    </div>

<?php echo $form->textFieldRow($model, 'title'); ?>


<?php echo $form->dropDownListRow($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English')); ?>


<?php echo $form->textFieldRow($model, 'from', array('size' => 30, 'maxlength' => 100, 'value' => '本站')); ?>


<?php echo $form->textFieldRow($model, 'url', array('size' => 60, 'maxlength' => 100)); ?>

<?php echo $form->textAreaRow($model, 'content'); ?>

    <?php
    $this->widget('comext.kindeditor.KindEditorWidget', array(
        'id' => 'Article_content', # Textarea id
        'language' => 'zh_CN',
        'items' => array(
            'width' => '700px',
            'height' => '300px',
            'themeType' => 'simple',
            'allowFileManager' => true,
            'allowImageUpload' => true,
            'allowFlashUpload' => true,
            'items' => array(
                'source', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link',
            )),
    ));
    ?>

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
