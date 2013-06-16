<?php
        $cs=Yii::app()->clientScript;
        $baseUrl=$this->module->assetsUrl;
        $cs->registerScriptFile($baseUrl.'/js/jquery-1.7.1.min.js');
        $cs->registerScriptFile($baseUrl.'/js/jquery.tagsinput.min.js');
        $cs->registerScriptFile($baseUrl.'/js/yiiseo.js');
        $cs->registerCssFile($baseUrl.'/css/tags.css');
        $cs->registerCssFile($baseUrl.'/img/close.png');
    ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'yiiseo-url-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>
    <fieldset>
        <legend class="legend blue"><strong >Main</strong></legend>
        <div class="row">
            <?php echo $form->labelEx($model,'url'); ?>
            <?php echo $form->textField($model,'url',array('size'=>60)); ?>
            <?php echo $form->error($model,'url'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'language'); ?>
            <?php echo $form->textField($model,'language',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'language'); ?>
        </div>
    </fieldset>

    <?php echo $this->renderPartial('_formMetaName', array('model'=>$modelTitle)); ?>

    <?php echo $this->renderPartial('_formMetaName', array('model'=>$modelDescription)); ?>

    <?php echo $this->renderPartial('_formMetaName', array('model'=>$modelKeywords)); ?>

    <?php if((!$model->isNewRecord)&&($modelOther!==null)) {?>
        <?php foreach($modelOther as $modelOther){?>
            <?php echo $this->renderPartial('_formMetaName', array('model'=>$modelOther)); ?>
        <?php }?>
    <?php }?>

    <span id="load-meta-name"></span>

    <fieldset>
            <legend class="legend red"><strong >Property</strong></legend>
            <?php if( (!$model->isNewRecord) && (count($model->yiiseoProperties)) ){?>
                <?php foreach($model->yiiseoProperties as $key=>$property){?>
                    <?php $this->renderPartial("_formMetaProperty",array('model'=>$property,'count'=>$key));?>
                <?php }?>
            <?php }?>
            <span id="load-meta-property"></span>
    </fieldset>


	<div class="row buttons">
        <?php echo CHtml::dropDownList("name","",array("robots"=>"robots","author"=>"author","copyright"=>"copyright"),array("empty"=>"change"))?>
        <?php echo CHtml::button("add meta name",array('class'=>"meta-name")); ?>
	</div>

    <div class="row buttons">
        <?php echo CHtml::button("add meta property",array('class'=>"meta-property","data-count"=>count($model->yiiseoProperties))); ?>
	</div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
