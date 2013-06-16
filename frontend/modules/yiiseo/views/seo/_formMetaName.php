<fieldset>
    <legend class="legend blue"><strong><?php echo $model->name;?></strong></legend>

    <?php if(!$model->isNewRecord){?>
        <?php echo CHtml::activeHiddenField($model,"[$model->name]id");?>
        <a style="float: right; margin-top: -5px; cursor: pointer;" title="Delete" class="deleteblock" data-id="<?php echo $model->id;?>"><img src="<?php echo $this->module->assetsUrl?>/img/close.png" alt=""></a>
    <?php } else {?>
        <a style="float: right; margin-top: -5px; cursor: pointer;" title="Delete" class="deleteblock"><img src="<?php echo $this->module->assetsUrl?>/img/close.png" alt=""></a>
    <?php } ?>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model,"[$model->name]content"); ?>
        <?php if($model->name == "keywords"){?>
            <?php echo CHtml::activeTextField($model,"[$model->name]content",array("size"=>60,"id"=>"tags")); ?>
        <?php } else {?>
            <?php echo CHtml::activeTextField($model,"[$model->name]content",array("size"=>60)); ?>
        <?php }?>
        <?php echo CHtml::error($model,"[$model->name]content"); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model,"[$model->name]param"); ?>
        <?php echo CHtml::activeDropDownList($model, "[$model->name]param", CHtml::listData($this->getParams(), "value", "name","group"), array("empty"=>"change param"));?>
        <?php echo CHtml::error($model,"[$model->name]param"); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model,"[$model->name]active"); ?>
        <?php echo CHtml::activeCheckBox($model,"[$model->name]active"); ?>
        <?php echo CHtml::error($model,"[$model->name]active"); ?>
    </div>
</fieldset>