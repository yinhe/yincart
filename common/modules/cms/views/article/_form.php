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
    <label class="control-label" for="Article_category_id">上一级</label>
    <div class="controls">
        <select name="Article[category_id]" id="Article_category_id"> 
            <?php echo $this->parent; ?>
        </select>
    </div>
</div>

<?php echo $form->textFieldRow($model, 'title'); ?>


<?php echo $form->dropDownListRow($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English')); ?>


<?php echo $form->textFieldRow($model, 'from', array('size' => 30, 'maxlength' => 100, 'value' => '本站')); ?>


<?php echo $form->textFieldRow($model, 'url', array('size' => 60, 'maxlength' => 100)); ?>

<?php echo $form->html5EditorRow($model, 'content', array('class'=>'span4', 'rows'=>5, 'height'=>'200', 'options'=>array('color'=>true))); ?>

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


<script type="text/javascript">
    $(function() {
        var tid = "<?php echo $model->category_id; ?>";

        $("#Article_category_id option").each(function(i) {

            if (this.value == tid)
            {
                $(this).attr("selected", "selected");
            }
        });
    });
</script>