<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'address-result-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


    <?php echo $form->textFieldRow($model, 'contact_name', array('class' => 'span5')); ?>

<div class="control-group">
    <?php
    $state_data = Area::model()->findAll("grade=:grade", array(":grade" => 1));

    $state = CHtml::listData($state_data, "id", "name");
    $s_default = $model->isNewRecord ? '' : $model->state;
    echo CHtml::dropDownList('AddressResult[state]', $s_default, $state, array(
        'empty' => '请选择省份',
        'ajax' => array(
            'type' => 'GET', //request type
            'url' => CController::createUrl('dynamiccities'), //url to call
            'update' => '#AddressResult_city', //selector to update
            'data' => 'js:"AddressResult_state="+jQuery(this).val()',
    )));

    //empty since it will be filled by the other dropdown
    $c_default = $model->isNewRecord ? '' : $model->city;
    if (!$model->isNewRecord) {
        $city_data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $model->state));
        $city = CHtml::listData($city_data, "id", "name");
    }

    $city_update = $model->isNewRecord ? array() : $city;
    echo CHtml::dropDownList('AddressResult[city]', $c_default, $city_update, array(
        'empty' => '请选择城市',
        'ajax' => array(
            'type' => 'GET', //request type
            'url' => CController::createUrl('dynamicdistrict'), //url to call
            'update' => '#AddressResult_district', //selector to update
            'data' => 'js:"AddressResult_city="+jQuery(this).val()',
    )));
    $d_default = $model->isNewRecord ? '' : $model->district;
    if (!$model->isNewRecord) {
        $district_data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $model->city));
        $district = CHtml::listData($district_data, "id", "name");
    }
    $district_update = $model->isNewRecord ? array() : $district;
    echo CHtml::dropDownList('AddressResult[district]', $d_default, $district_update, array(
        'empty' => '请选择地区',
            )
    );
    ?>
    <?php echo $form->textFieldRow($model, 'zipcode', array('class'=>'span2')); ?>
</div>


<?php echo $form->textFieldRow($model, 'address', array('class' => 'span5')); ?>


<?php echo $form->textFieldRow($model, 'mobile_phone', array('class' => 'span5')); ?>


<?php echo $form->textFieldRow($model, 'phone', array('class' => 'span5')); ?>


<?php echo $form->dropDownlistRow($model, 'is_default', array('0' => '否', '1' => '是')); ?>


<?php echo $form->textAreaRow($model, 'memo', array('class' => 'span5', 'style' => 'height:200px')); ?>

<div class="form-actions">
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => $model->isNewRecord ? '创建' : '保存',
));
?>
</div>

    <?php $this->endWidget(); ?>