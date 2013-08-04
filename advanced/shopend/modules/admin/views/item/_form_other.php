<div class="row">
    <?php echo $form->labelEx($model, 'post_fee', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->textField($model, 'post_fee'); ?>
    </div>
    <?php echo $form->error($model, 'post_fee'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'express_fee', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->textField($model, 'express_fee'); ?>
    </div>
    <?php echo $form->error($model, 'express_fee'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'ems_fee', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->textField($model, 'ems_fee'); ?>
    </div>
    <?php echo $form->error($model, 'ems_fee'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'is_show', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->radioButtonList($model, 'is_show', array('1' => '是', '0' => '否')); ?>
    </div>
    <?php echo $form->error($model, 'is_show'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'is_promote', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->radioButtonList($model, 'is_promote', array('1' => '是', '0' => '否')); ?>
    </div>
    <?php echo $form->error($model, 'is_promote'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'is_new', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->radioButtonList($model, 'is_new', array('1' => '是', '0' => '否')); ?>
    </div>
    <?php echo $form->error($model, 'is_new'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'is_hot', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->radioButtonList($model, 'is_hot', array('1' => '是', '0' => '否')); ?>
    </div>
    <?php echo $form->error($model, 'is_hot'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'is_best', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->radioButtonList($model, 'is_best', array('1' => '是', '0' => '否')); ?>
    </div>
    <?php echo $form->error($model, 'is_best'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'is_discount', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->radioButtonList($model, 'is_discount', array('1' => '是', '0' => '否')); ?>
    </div>
    <?php echo $form->error($model, 'is_discount'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'sort_order', array('class' => 'col-lg-2 control-label')); ?>
    <div class="col-lg-5">
	<?php echo $form->textField($model, 'sort_order'); ?>
    </div>
    <?php echo $form->error($model, 'sort_order'); ?>
</div>
