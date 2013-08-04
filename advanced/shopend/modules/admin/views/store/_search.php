<?php
/* @var $this StoreController */
/* @var $model Store */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldControlGroup($model,'store_id',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'user_id',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>100)); ?>

	<?php echo $form->textFieldControlGroup($model,'domain',array('span'=>5,'maxlength'=>200)); ?>

	<?php echo $form->textFieldControlGroup($model,'type',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'years',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'theme',array('span'=>5,'maxlength'=>50)); ?>

	<?php echo $form->textFieldControlGroup($model,'start_time',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'end_time',array('span'=>5)); ?>

	<?php echo $form->textAreaControlGroup($model,'introduction',array('rows'=>6,'span'=>8)); ?>

	<?php echo $form->textFieldControlGroup($model,'create_time',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'update_time',array('span'=>5)); ?>

	<div class="form-actions">
		<?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->