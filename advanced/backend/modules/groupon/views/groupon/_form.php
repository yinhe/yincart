<?php
/* @var $this ARGrouponController */
/* @var $model ARGroupon */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'argroupon-create-form',
	'enableAjaxValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
            'validateOnChange'=>false,
        ),
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">带 <span class="required">*</span> 为必填项 .</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php 
            $this->widget('bootstrap.widgets.TbTabs',array(
                'type'=>'tabs',
                'placement'=>'above',//'above,right,below,left'
                'tabs'=>array(
                    array('label'=>'基本信息','content'=>$this->renderPartial('_form_base',array('model'=>$model,'form'=>$form),true),'active'=>true),
                    array('label'=>'分类信息','content'=>$this->renderPartial('_form_cate',array('model'=>$model,'form'=>$form),true)),
                    array('label'=>'价格信息','content'=>$this->renderPartial('_form_price',array('model'=>$model,'form'=>$form),true)),
                    array('label'=>'数量信息','content'=>$this->renderPartial('_form_number',array('model'=>$model,'form'=>$form),true)),
                    array('label'=>'时间信息','content'=>$this->renderPartial('_form_time',array('model'=>$model,'form'=>$form),true)),
                ),
            ));
        ?>
        <?php echo H::hiddenField('return_url', Yii::app()->request->urlReferrer)?>
        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton',array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>$model->isNewRecord?'创建':'修改'
            ))?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->