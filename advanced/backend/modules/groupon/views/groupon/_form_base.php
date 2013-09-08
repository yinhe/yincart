<?php echo $form->textFieldRow($model, 'title',array('class'=>'span10'))?>
        
<?php echo $form->textFieldRow($model, 'short_title')?>

<?php echo $form->textFieldRow($model,'sms_title');?>

<?php echo $form->dropDownListRow($model, 'contract_id', ARContract::myContracts(),array(
    'prompt'=>'请选择',
    'ajax'=>array(
        'type'=>'POST',
        'url'=>$this->createUrl('ajax/biz'),
        'update'=>'#ARGroupon_biz_id',
        'data'=>array('contract_id'=>'js:$("#ARGroupon_contract_id").val()'),
    ),
    ));?>
<?php echo $form->dropDownListRow($model, 'biz_id', ARBiz::myBiz($model->biz_id), array('prompt'=>'请选择'))?>


<?php echo $form->fileFieldRow($model,'image')?>
<?php echo $form->textFieldRow($model, 'sort',array('class'=>'span1'))?>