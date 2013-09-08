<?php echo $form->textFieldRow($model, 'max_number',array('class'=>'span2','hint'=>'-1表示不限制库存，默认不限制'));?>
<?php echo $form->textFieldRow($model, 'per_number',array('class'=>'span2','hint'=>'0表示不限制'));?>
<?php echo $form->textFieldRow($model, 'once_number',array('class'=>'span2','hint'=>'0表示不限制'));?>
<?php echo $form->textFieldRow($model, 'begin_number',array('class'=>'span2'));?>
<?php echo $form->textFieldRow($model, 'pre_number',array('class'=>'span2'));?>