<?php
$action = 'article';
//$id = Yii::app()->user->id;
//$id = array_rand(array_fill_keys(range('a','z'), null), 1);
$id = NULL;
Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '&id=' . $id . '"', CClientScript::POS_HEAD);
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'article-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
            <?php echo $form->dropDownList($model,'category_id', $model->attrCategory(5)); ?>
            <?php echo $form->error($model,'category_id'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'title', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'title', array('class' => 'span5')); ?>
            <?php echo $form->error($model,'title'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'language', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model,'language', array('en_us' => 'English' , 'zh_cn' => '中文')); ?>
            <?php echo $form->error($model,'language'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'from', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'from', array('class' => 'span5', 'value' => '本站')); ?>
            <?php echo $form->error($model,'from'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'url', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'url', array('class' => 'span5')); ?>
            <?php echo $form->error($model,'url'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'summary', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textArea($model,'summary', array('class' => 'span5', 'style'=>'height:100px')); ?>
            <?php echo $form->error($model,'summary'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'content', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textArea($model,'content', array('visibility' => 'hidden')); ?>
            <?php
            $this->widget('comext.kindeditor.KindEditorWidget', array(
                'id' => 'Article_content', //Textarea id
                'items' => array(
                    'width' => '700px',
                    'height' => '300px',
                    'themeType' => 'simple',
                    'allowImageUpload' => true,
                    'allowFileUpload' => true,
                    'allowFileManager' => true,
                    'items' => array(
                        'source', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',
                        'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
                        'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
                        'emoticons', 'image', 'multiimage', 'link',
                    ),
                ),
                'options' => array('action' => $action, 'id' => $id)
            ));
            ?>
            <?php echo $form->error($model,'content'); ?>
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
