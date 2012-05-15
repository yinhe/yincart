<form  action="<?php echo Yii::app()->createUrl("/product/index")?>" method="get">
<?php echo CHtml::textField('keyword','请输入关键字') ?>
<?php echo CHtml::submitButton('搜索'); ?>
</form>