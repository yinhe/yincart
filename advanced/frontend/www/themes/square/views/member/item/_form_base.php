<?php echo $form->textFieldControlGroup($model, 'title'); ?>
<?php echo $form->dropDownListControlGroup($model, 'category_id', $model->attrCategory(3)); ?>
<?php echo $form->textFieldControlGroup($model, 'sn'); ?>
<?php echo $form->textFieldControlGroup($model, 'unit', array('hint' => '例如：块、片、个、瓶、条')); ?>
<?php echo $form->textFieldControlGroup($model, 'stock', array('hint' => '库存默认为1000')); ?>
<?php echo $form->textFieldControlGroup($model, 'min_number', array('hint' => '最少订货量默认为1')); ?>
<?php echo $form->textFieldControlGroup($model, 'market_price'); ?>
<?php echo $form->textFieldControlGroup($model, 'shop_price'); ?>
<?php echo $form->dropDownListControlGroup($model, 'currency', array('$' => '美元', '￥' => '人民币')); ?>
<?php echo $form->dropDownListControlGroup($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English')); ?>