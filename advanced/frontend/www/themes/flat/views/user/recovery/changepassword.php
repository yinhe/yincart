<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change password");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Change password"),
);
?>

<h3><?php echo UserModule::t("Change password"); ?></h3>


<div class="form-horizontal" style="padding:0 20px">
<?php echo CHtml::beginForm(); ?>

	<p class="help-block"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
        
	<?php echo CHtml::errorSummary($form, '请更正以下错误：', '', array('class' => 'text-error')); ?>
	
	<div class="control-group">
	<?php echo CHtml::activeLabelEx($form,'password'); ?>
	<?php echo CHtml::activePasswordField($form,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	
	<div class="control-group">
	<?php echo CHtml::activeLabelEx($form,'verifyPassword'); ?>
	<?php echo CHtml::activePasswordField($form,'verifyPassword'); ?>
	</div>
		
        <div class="form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => UserModule::t("Save"),
            ));
            ?>
        </div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->