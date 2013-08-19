<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'arbiz-create-form',
//	'enableClientValidation'=>true,
        'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
       'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="help-block">带<span class="required">*</span> 为必填项。</p>
        
	<?php echo $form->errorSummary($model); ?>
        <?php
        $this->widget('bootstrap.widgets.TbTabs', array(
            'type' => 'tabs',
            'placement' => 'above', // 'above', 'right', 'below' or 'left'
            'tabs' => array(
                array('label' => '基本信息', 'content' => $this->renderPartial("_form_base", array('model' => $model, 'form'=>$form), true), 'active' => true),
                array('label' => '银行信息', 'content' => $this->renderPartial("_form_bank", array("model" => $model, 'form'=>$form), true)),
                array('label' => '登陆信息', 'content' => $this->renderPartial("_form_login", array("model" => $model, 'form'=>$form), true)),
            ),
        ));
        ?>
        <?php // echo H::hiddenField('return_url', Yii::app()->request->urlReferrer)?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->