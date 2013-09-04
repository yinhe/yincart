<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'arcontract-create-form',
//	'enableClientValidation'=>false,
//        'enableAjaxValidation' => true,
//        'clientOptions' => array(
//            'validateOnSubmit' => true,
//        ),
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            ));
    ?>

    <p class="help-block">带<span class="required">*</span> 为必填项。</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model, 'name', array('class' => 'span3')); ?>
    <?php echo $form->datepickerRow($model, 'sign_time', array('class' => 'span2', 'options' => array('language' => 'zh-CN', 'format' => 'yyyy-mm-dd'))); ?>
    <?php echo $form->datepickerRow($model, 'online_time', array('class' => 'span2', 'options' => array('language' => 'zh-CN', 'format' => 'yyyy-mm-dd'))); ?>
    <?php echo $form->datepickerRow($model, 'end_time', array('class' => 'span2', 'options' => array('language' => 'zh-CN', 'format' => 'yyyy-mm-dd'))); ?>
    <?php echo $form->radioButtonListInlineRow($model, 'if_billing', array('1' => '需要', '0' => '不需要'), array('lable' => '开具发票')); ?>
    <?php echo H::hiddenField('return_url', Yii::app()->request->urlReferrer) ?>

    
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? '创建' : '保存',
        ));
        ?>
    </div>

<?php $this->endWidget(); ?>
<?php
    echo H::label('上传合同附件',FALSE);
    $this->widget('xupload.XUpload', array(
        'url' => Yii::app()->createUrl("/groupon/contract/upload", array("parent_id" => 1)),
        'model' => $upload,
        'attribute' => 'file',
        'multiple' => true,
        'htmlOptions' => array('id' => 'arcontract-attach-form'),
    ));
?>
</div><!-- form -->