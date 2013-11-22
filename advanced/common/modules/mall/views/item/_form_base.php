<?php echo $form->textFieldRow($model, 'title', array('lable' => '商品标题')); ?>
<?php echo $form->textFieldRow($model, 'sn', array('lable' => '商品货号')); ?>
<?php echo $form->textFieldRow($model, 'unit', array('lable' => '单位', 'hint' => '例如：块、片、个、瓶、条')); ?>
<?php echo $form->textFieldRow($model, 'stock', array('lable' => '库存', 'hint' => '库存默认为1000')); ?>
<?php echo $form->textFieldRow($model, 'min_number', array('lable' => '最少订货量', 'hint' => '最少订货量默认为1')); ?>
<?php echo $form->textFieldRow($model, 'market_price', array('lable' => '零售价')); ?>
<?php echo $form->textFieldRow($model, 'shop_price', array('lable' => '批发价')); ?>
<?php echo $form->dropDownListRow($model, 'currency', array('$' => '美元', '￥' => '人民币'), array('lable' => '货币')); ?>
<?php echo $form->dropDownListRow($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English'), array('lable' => '语言')); ?>