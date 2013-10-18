<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form TbActiveForm */
$action = 'post';
//$id = Yii::app()->user->id;
//$id = array_rand(array_fill_keys(range('a','z'), null), 1);
$id = NULL;
Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '&id=' . $id . '"', CClientScript::POS_HEAD);
?>
<div class="form">

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'post-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'enableAjaxValidation' => false,
    )); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListControlGroup($model, 'category_id', $model->attrCategory(8)); ?>

    <?php echo $form->textFieldControlGroup($model, 'title', array('span' => 5, 'maxlength' => 128)); ?>

    <?php echo $form->textFieldControlGroup($model, 'url', array('span' => 5, 'maxlength' => 100)); ?>

    <?php echo $form->textFieldControlGroup($model, 'source', array('span' => 5, 'maxlength' => 50)); ?>

    <?php echo $form->textAreaControlGroup($model, 'summary', array('rows' => 6, 'span' => 5)); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model,'content', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textArea($model,'content', array('visibility' => 'hidden')); ?>
            <?php
            $this->widget('comext.kindeditor.KindEditorWidget', array(
                'id' => 'Post_content', //Textarea id
                'items' => array(
                    'width' => '700px',
                    'height' => '300px',
                    'themeType' => 'simple',
                    'allowImageUpload' => true,
                    'allowFileUpload' => true,
                    'allowFileManager' => true,
                    'items' => array(
                        'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
                        'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                        'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                        'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                        'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
                        'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
                        'anchor', 'link', 'unlink'
                    ),
                ),
                'options' => array('action' => $action, 'id' => $id)
            ));
            ?>
            <?php echo $form->error($model,'content'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'tags'); ?>
        <div class="controls">
        <?php $this->widget('CAutoComplete', array(
            'model'=>$model,
            'attribute'=>'tags',
            'url'=>array('suggestTags'),
            'multiple'=>true,
            'htmlOptions'=>array('size'=>50),
        )); ?>
        <p class="hint">Please separate different tags with commas.</p>
        <?php echo $form->error($model,'tags'); ?>
        </div>
    </div>

    <?php echo $form->dropDownListControlGroup($model,'status',Lookup::items('PostStatus')); ?>

    <?php echo $form->dropDownListControlGroup($model, 'language', array('zh_cn'=>'中文', 'en'=>'英文')); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->