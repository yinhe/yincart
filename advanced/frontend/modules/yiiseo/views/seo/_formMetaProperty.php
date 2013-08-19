<div class="property">
    <?php echo CHtml::activeTextField($model,"[$count]name",array("class"=>"fInputs",'placeholder'=>"property name"));?>
    <?php echo CHtml::activeTextField($model,"[$count]content",array('class'=>"fInputs",'placeholder'=>"property content"));?>
    <?php echo CHtml::activeDropDownList($model, "[$count]param", CHtml::listData($this->getParams(), "value", "name","group"), array("empty"=>"change param",'class'=>"fInputs"));?>

    <?php if(!$model->isNewRecord){?>
        <?php echo CHtml::activeHiddenField($model,"[$count]id");?>
        <a style="float: right; margin-top: 5px; cursor: pointer;" title="Delete property" class="deleteproperty" data-id="<?php echo $model->id;?>"><img src="<?php echo $this->module->assetsUrl?>/img/close.png" alt=""></a>
    <?php } else {?>
        <a style="float: right; margin-top: 5px; cursor: pointer;" title="Delete property" class="deleteproperty"><img src="<?php echo $this->module->assetsUrl?>/img/close.png" alt=""></a>
    <?php } ?>


</div>