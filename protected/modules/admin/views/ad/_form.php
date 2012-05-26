<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
	<div class="row">
		<?php echo $form->labelEx($model,'ad_name'); ?>
		<?php echo $form->textField($model,'ad_name',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'ad_name'); ?>
	</div>        

	<div class="row">
		<?php echo $form->labelEx($model,'position_id'); ?>
		<?php 
                $AdPosition = AdPosition::model()->findAll();
                $list = CHtml::listData($AdPosition, 'position_id', 'position_name');
                echo $form->DropDownList($model,'position_id', $list); ?>
		<?php echo $form->error($model,'position_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_type'); ?>
		<?php echo $form->radioButtonList($model,'media_type', array('0'=>'图片', '1'=>'Flash', '2'=>'代码', '3'=>'文字'), array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'labelForRadio'))); ?>
		<?php echo $form->error($model,'media_type'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'start_time'); ?>
		<?php //echo $form->textField($model,'start_time'); 
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name'=>'Ad[start_time]',
                    'language'=>'zh_cn',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                    'showAnim'=>'fold',
                    ),
                    'htmlOptions'=>array(
                    'style'=>'height:20px;'
                    ),
                    ));
                ?>
		<?php echo $form->error($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_time'); ?>
		<?php //echo $form->textField($model,'end_time');
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name'=>'Ad[end_time]',
                    'language'=>'zh_cn',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                    'showAnim'=>'fold',
                    ),
                    'htmlOptions'=>array(
                    'style'=>'height:20px;'
                    ),
                    ));
                ?>
		<?php echo $form->error($model,'end_time'); ?>
	</div>        


	<div class="row">
		<?php echo $form->labelEx($model,'ad_link'); ?>
		<?php echo $form->textField($model,'ad_link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ad_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_code'); ?>
		<?php echo $form->textArea($model,'ad_code',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ad_code'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'enabled'); ?>
		<?php echo $form->radioButtonList($model,'enabled', array('1'=>'开启', '0'=>'关闭'),  array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'labelForRadio'))); ?>
		<?php echo $form->error($model,'enabled'); ?>
	</div>        

	<div class="row">
		<?php echo $form->labelEx($model,'link_man'); ?>
		<?php echo $form->textField($model,'link_man',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'link_man'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_email'); ?>
		<?php echo $form->textField($model,'link_email',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'link_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_phone'); ?>
		<?php echo $form->textField($model,'link_phone',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'link_phone'); ?>
	</div>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'click_count'); ?>
		<?php echo $form->textField($model,'click_count'); ?>
		<?php echo $form->error($model,'click_count'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->