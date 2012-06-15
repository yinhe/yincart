<?php
echo CGoogleApi::init();
//echo CHtml::script(CGoogleApi::load('jquery', '1.4.2'));
echo CHtml::script(CGoogleApi::load("jqueryui", "1.8.2"));
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.dynotable.js');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#t1').dynoTable();

        /*
         * dynoTable configuration options
         * These are the options that are available with their default values
         */
        $('#t1').dynoTable({
            removeClass: '.row-remover',        //class for the clickable row remover
            cloneClass: '.row-cloner',          //class for the clickable row cloner
            addRowTemplateId: '#add-template',  //id for the "add row template"
            addRowButtonId: '#add-row',         //id for the clickable add row button, link, etc
            lastRowRemovable: true,             //If true, ALL rows in the table can be removed, otherwise there will always be at least one row
            orderable: true,                    //If true, table rows can be rearranged
            dragHandleClass: ".drag-handle",    //class for the click and draggable drag handle
            insertFadeSpeed: "slow",            //Fade in speed when row is added
            removeFadeSpeed: "fast",            //Fade in speed when row is removed
            hideTableOnEmpty: true,             //If true, table is completely hidden when empty
            onRowRemove: function(){
                //Do something when a row is removed
            },
            onRowClone: function(){
                //Do something when a row is cloned
            },
            onRowAdd: function(){
                //Do something when a row is added
            },
            onTableEmpty: function(){
                //Do something when ALL rows have been removed
            },
            onRowReorder: function(){
                //Do something when table rows have been rearranged
            }
        });
    });
</script>
<style type="text/css">
    table {
        background: #D0E5F5;
        border: 1px solid #c0c0c0; 
        width:660px;
    }

    table th{
        padding:10px;
        text-align:center;
    }

    table td {
        vertical-align: middle;
        text-align:center; 
    }

    table td input {
        width:150px;
        margin: 0;
        background: #fff;
        height: 18px;
    }  

    table td select {
        background: #fff;
        height: 18px;
        width: 90px;
    }

    table .icons{
        width:50px;
    }

    #msg {
        width: 420px;
        float:left;
    }

    button {
        width: 100px;
        height: 25px; 
        float:left;                
    }

    .clr {
        clear: both;
    }

    .row-cloner, .row-remover {
        cursor: pointer;
    } 

    pre, code {
        margin: 0 !important;
        padding: 0 !important;
    }
</style>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'item-prop-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'category_id'); ?>
     <?php
                            $cri = new CDbCriteria(array(
                                'condition'=>'parent_id = 0'
                            ));
                            $cat = Category::model()->findAll($cri);
                            $list = CHtml::listData($cat, 'category_id', 'name');
                            echo CHtml::DropDownList('ItemProp[category_id]', $model->category_id ? $model->category_id : '', $list, array('empty'=>'请选择类目'));
                            ?>
     </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'parent_prop_id'); ?>
        <select name="ItemProp[parent_prop_id]" id="ItemProp_parent_prop_id"> 
            <?php echo $this->parent; ?>
        </select> 
        <?php echo $form->error($model, 'parent_prop_id'); ?>
    </div>

    <!--	<div class="row">
    <?php echo $form->labelEx($model, 'parent_value_id'); ?>
    <?php echo $form->textField($model, 'parent_value_id', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->error($model, 'parent_value_id'); ?>
    </div>-->

    <div class="row">
        <?php echo $form->labelEx($model, 'prop_name'); ?>
        <?php echo $form->textField($model, 'prop_name', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'prop_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'prop_alias'); ?>
        <?php echo $form->textField($model, 'prop_alias', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'prop_alias'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php echo $form->radioButtonList($model, 'type', array('input' => '输入', 'optional' => '枚举', 'multiCheck' => '多选'), array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'labelForRadio'))); ?>
        <?php echo $form->error($model, 'type'); ?>
    </div>

    <div class="grid_2 alpha">
        <div class="row">
            <?php echo $form->labelEx($model, 'is_key_prop'); ?>
            <?php echo $form->dropDownList($model, 'is_key_prop', array('1' => '是', '0' => '否')); ?>
            <?php echo $form->error($model, 'is_key_prop'); ?>
        </div>
    </div>
    <div class="grid_2">
        <div class="row">
            <?php echo $form->labelEx($model, 'is_sale_prop'); ?>
            <?php echo $form->dropDownList($model, 'is_sale_prop', array('1' => '是', '0' => '否')); ?>
            <?php echo $form->error($model, 'is_sale_prop'); ?>
        </div>
    </div>
    <div class="grid_2">
        <div class="row">
            <?php echo $form->labelEx($model, 'is_color_prop'); ?>
            <?php echo $form->dropDownList($model, 'is_color_prop', array('1' => '是', '0' => '否')); ?>
            <?php echo $form->error($model, 'is_color_prop'); ?>
        </div>
    </div>
    <div class="grid_2">
        <div class="row">
            <?php echo $form->labelEx($model, 'is_enum_prop'); ?>
            <?php echo $form->dropDownList($model, 'is_enum_prop', array('1' => '是', '0' => '否')); ?>
            <?php echo $form->error($model, 'is_enum_prop'); ?>
        </div>
    </div>
    <div class="grid_2">
        <div class="row">
            <?php echo $form->labelEx($model, 'is_item_prop'); ?>
            <?php echo $form->dropDownList($model, 'is_item_prop', array('1' => '是', '0' => '否')); ?>
            <?php echo $form->error($model, 'is_item_prop'); ?>
        </div>
    </div>
    <div class="grid_2">
        <div class="row">
            <?php echo $form->labelEx($model, 'must'); ?>
            <?php echo $form->dropDownList($model, 'must', array('1' => '是', '0' => '否')); ?>
            <?php echo $form->error($model, 'must'); ?>
        </div>
    </div>
    <div class="grid_2">
        <div class="row">
            <?php echo $form->labelEx($model, 'multi'); ?>
            <?php echo $form->dropDownList($model, 'multi', array('1' => '是', '0' => '否')); ?>
            <?php echo $form->error($model, 'multi'); ?>
        </div>
    </div>
    <div class="clear"></div>
    <!--	<div class="row">
    <?php echo $form->labelEx($model, 'prop_values'); ?>
    <?php echo $form->textArea($model, 'prop_values', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->error($model, 'prop_values'); ?>
    </div>-->

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', array('normal' => '正常', 'deleted' => '删除')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'sort_order'); ?>
        <?php echo $form->textField($model, 'sort_order'); ?>
        <?php echo $form->error($model, 'sort_order'); ?>
    </div>

    <h2><a id="add-row" href="#">添加属性值</a></h2>  
    <fieldset>
        <legend>属性值</legend>
        <div class="PropValues">
            <table id="t1" class="example">
                <tr>
                    <th>移动</th>
                    <th>属性值名称</th>
                    <th>类目</th>
                    <th>排序</th>
                    <th>克隆</th>
                    <th>删除</th>
                </tr>
                <?php if ($model->isNewRecord) { ?>
                    <tr id="add-template">
                        <td class="icons">
                            <img class="drag-handle" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/drag.png" alt="click and drag to rearrange" />
                        </td>
                        <td>
                            <input id="tf1" type="text" name="PropValue[value_name][]" />
                        </td>
                        <td>
                            <?php
                            $cri = new CDbCriteria(array(
                                'condition'=>'parent_id = 0'
                            ));
                            $cat = Category::model()->findAll($cri);
                            $list = CHtml::listData($cat, 'category_id', 'name');
                            echo CHtml::DropDownList('PropValue[category_id][]', '', $list, array('id'=>'tf2__c'));
                            ?>
                        </td>
                        <td>
                            <input id="tf3" type="text" name="PropValue[sort_order][]" />
                        </td>
                        <td class="icons">
                            <img class="row-cloner" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/clone.png" alt="Clone Row" />
                        </td>
                        <td class="icons">
                            <img class="row-remover" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/remove.png" alt="Remove Row" />
                        </td>
                    </tr>
                    <?php
                } else {
                    $cri = new CDbCriteria(array(
                                'condition' => 'prop_id =' . $model->prop_id,
                                'order' => 'sort_order asc, value_id asc'
                            ));
                    $propValues = PropValue::model()->findAll($cri);

                    foreach ($propValues as $k => $sv) {
                        ?>
                        <tr id="update-template">
                            <td class="icons">
                                <img class="drag-handle" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/drag.png" alt="click and drag to rearrange" />
                            </td>
                            <td>
                                <input id="tf1__c" type="text" name="PropValue[value_name][]" value="<?php echo $sv->value_name ?>" />
                            </td>
                            <td>
                                <?php
                            $cri = new CDbCriteria(array(
                                'condition'=>'parent_id = 0'
                            ));
                            $cat = Category::model()->findAll($cri);
                            $list = CHtml::listData($cat, 'category_id', 'name');
                            echo CHtml::DropDownList('PropValue[category_id][]', $sv->category_id, $list, array('id'=>'tf2__c'));
                            ?>
                            </td>
                            <td>
                                <input id="tf3__c" type="text" name="PropValue[sort_order][]" value="<?php echo $sv->sort_order ?>" />
                            </td>
                            <td class="icons">
                                <img class="row-cloner" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/clone.png" alt="Clone Row" />
                            </td>
                            <td class="icons">
                                <img class="row-remover" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/remove.png" alt="Remove Row" />
                            </td>
                        </tr>
                    <?php } ?>

                    <tr id="add-template">
                        <td class="icons">
                            <img class="drag-handle" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/drag.png" alt="click and drag to rearrange" />
                        </td>
                        <td>
                            <input id="tf1" type="text" name="PropValue[value_name][]" />
                        </td>
                        <td>
                            <?php
                            $cri = new CDbCriteria(array(
                                'condition'=>'parent_id = 0'
                            ));
                            $cat = Category::model()->findAll($cri);
                            $list = CHtml::listData($cat, 'category_id', 'name');
                            echo CHtml::DropDownList('PropValue[category_id][]', '', $list, array('id'=>'tf2__c'));
                            ?>
                        </td>
                        <td>
                            <input id="tf3" type="text" name="PropValue[sort_order][]" />
                        </td>
                        <td class="icons">
                            <img class="row-cloner" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/clone.png" alt="Clone Row" />
                        </td>
                        <td class="icons">
                            <img class="row-remover" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/remove.png" alt="Remove Row" />
                        </td>
                    </tr>

                <?php } ?>
            </table>

        </div>
    </fieldset>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->