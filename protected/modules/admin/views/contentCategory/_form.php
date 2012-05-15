<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
                <select name="ContentCategory[parent_id]" id="ContentCategory_parent_id"> 
                <?php echo $this->parent;?>
                </select> 
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_name'); ?>
		<?php echo $form->textField($model,'category_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'category_name'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(function(){ 
		var tid = "<?php echo $model->parent_id;?>";

					$("#ContentCategory_parent_id option").each(function(i){

						if(this.value == tid)
						{
							$(this).attr("selected","selected");
						} 
					}); 
	});
</script>