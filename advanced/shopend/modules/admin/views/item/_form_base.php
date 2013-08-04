<div class="row">
    <?php echo $form->labelEx($model, 'title', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->textField($model, 'title'); ?>
    </div>
    <?php echo $form->error($model, 'title'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'unit', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->textField($model, 'unit'); ?>
	<p class="help-block">例如：块、片、个、瓶、条</p>
    </div>
    <?php echo $form->error($model, 'unit'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'stock', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->textField($model, 'stock'); ?>
	<p class="help-block">库存默认为1000</p>
    </div>
    <?php echo $form->error($model, 'stock'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'min_number', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->textField($model, 'min_number'); ?>
	<p class="help-block">最少订货量默认为1</p>
    </div>
    <?php echo $form->error($model, 'min_number'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'market_price', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->textField($model, 'market_price'); ?>
    </div>
    <?php echo $form->error($model, 'market_price'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'shop_price', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->textField($model, 'shop_price'); ?>
    </div>
    <?php echo $form->error($model, 'shop_price'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'currency', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->dropDownList($model, 'currency', array('$' => '美元', '￥' => '人民币')); ?>
    </div>
    <?php echo $form->error($model, 'currency'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'language', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->dropDownList($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English')); ?>
    </div>
    <?php echo $form->error($model, 'language'); ?>
</div>