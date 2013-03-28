<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'article-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        <label for="ContentCategory_parent_id">上一级</label>
        <select name="ContentCategory[parent_id]" id="ContentCategory_parent_id"> 
                <?php echo $this->parent;?>
        </select> 

        <?php echo $form->textFieldRow($model,'name',array('class'=>'span5', 'maxlength'=>50)); ?>
        
        <?php echo $form->textFieldRow($model,'sort_order',array('class'=>'span5', 'maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
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