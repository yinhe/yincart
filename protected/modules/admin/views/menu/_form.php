<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<select name="Menu[parent_id]" id="Menu_parent_id"> 
                <?php echo $this->parent;?>
                </select> 
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'en_name'); ?>
		<?php echo $form->textField($model,'en_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'en_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'menu_url'); ?>
		<?php echo $form->textField($model,'menu_url',array('size'=>60,'maxlength'=>255)); ?>
            <span class="hint">格式为：模块/控制器/动作  Modules/Controller/action 没地址请留空</span>
		<?php echo $form->error($model,'menu_url'); ?>
	</div>
        
                
        <div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array('middle'=>'前台主目录导航','bottom'=>'前台底部导航', 'admin'=>'后台菜单导航')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'is_show'); ?>
		<?php echo $form->dropDownList($model,'is_show',array('1'=>'是','0'=>'否')); ?>
		<?php echo $form->error($model,'is_show'); ?>
	</div>
        

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>
        
        

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(function(){ 
		var tid = "<?php echo $model->menu_id;?>";

					$("#Menu_parent_id option").each(function(i){

						if(this.value == tid)
						{
							$(this).attr("selected","selected");
						} 
					}); 
	});
</script>