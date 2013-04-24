<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'item-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'type' => 'horizontal',
    ));
    ?>
    <p class="help-block">带 <span class="required">*</span> 的字段为必填项.</p>
    <fieldset>
        <?php echo $form->textFieldRow($model, 'title', array('lable' => '商品标题')); ?>
            <div class="control-group ">
        <label for="Page_category_id" class="control-label required">商品分类 <span class="required">*</span></label>
        <div class="controls">
            <?php
            
            echo '<select id="Item_category_id" name="Item[category_id]">';
            $category = Category::model()->findByPk(3);
            $descendants = $category->descendants()->findAll();
            $level = 1;

            echo '<option value="0" >请选择分类</option>';
            foreach ($descendants as $child) {
                $string = '&nbsp;&nbsp;';
                $string .= str_repeat('&nbsp;&nbsp;', $child->level - $level);
                if ($child->isLeaf() && !$child->next()->find()) {
                    $string .= '';
                } else {

                    $string .= '';
                }
                $string .= '' . $child->name;
//		echo $string;
                if (!$model->isNewRecord) {
                    if ($model->category_id == $child->id) {
                        $selected = 'selected';

                        echo '<option value="' . $child->id . '" selected="' . $selected . '">' . $string . '</option>';
                    } else {
                        echo '<option value="' . $child->id . '" >' . $string . '</option>';
                    }
                } else {
                    echo '<option value="' . $child->id . '" >' . $string . '</option>';
                }
            }

            echo '</select>';
            ?>
        </div>
    </div>
        <?php echo $form->textFieldRow($model, 'sn', array('lable' => '商品货号')); ?>
        <?php echo $form->textFieldRow($model, 'unit', array('lable' => '单位', 'hint' => '例如：块、片、个、瓶、条')); ?>
        <?php echo $form->textFieldRow($model, 'stock', array('lable' => '库存', 'hint' => '库存默认为1000')); ?>
        <?php echo $form->textFieldRow($model, 'min_number', array('lable' => '最少订货量', 'hint' => '最少订货量默认为1')); ?>
        <?php echo $form->textFieldRow($model, 'market_price', array('lable' => '零售价')); ?>
        <?php echo $form->textFieldRow($model, 'shop_price', array('lable' => '批发价')); ?>
        <?php echo $form->dropDownListRow($model, 'currency', array('￥' => '人民币', '$' => '美元'), array('lable' => '货币')); ?>
        <?php echo $form->dropDownListRow($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English'), array('lable' => '语言')); ?>
        <?php echo $form->fileFieldRow($model, 'pic_url', array('lable' => '商品主图片地址')); ?>
        <?php echo $form->ckEditorRow($model, 'desc', array('lable' => '商品描述', 'options' => array('fullpage' => 'js:true', 'width' => '640', 'resize_minWidth' => '320'))); ?>
        <?php echo $form->textFieldRow($model, 'post_fee', array('lable' => '平邮费用')); ?>
        <?php echo $form->textFieldRow($model, 'express_fee', array('lable' => '快递费用')); ?>
        <?php echo $form->textFieldRow($model, 'ems_fee', array('lable' => 'EMS 费用')); ?>

        <?php if (!$model->isNewRecord) { ?>
            <legend>商品属性</legend>
            <h3>关键属性</h3>
            <?php
            $cri = new CDbCriteria(array('condition' => 'is_key_prop=1 and category_id =' . $model->category->id));
            $props = ItemProp::model()->findAll($cri);
            foreach ($props as $p) {
                echo "<div class=\"control-group \">";
                echo "<label class=\"control-label\">" . $p->prop_name . "</label><div class=\"controls\">";
                echo $p->getPropOptionValues($p->prop_name);
                echo '</div></div>';
            }
            echo '<h3>销售属性</h3>';
            $cri = new CDbCriteria(array(
                'condition' => 'is_sale_prop=1 and category_id =' . $model->category->id,
            ));
            $props = ItemProp::model()->findAll($cri);
            foreach ($props as $p) {
                echo "<div class=\"control-group \">";
                echo "<label class=\"control-label\">" . $p->prop_name . "</label><div class=\"controls\">";
                echo "<input id=\"ytTestForm_inlineCheckboxes\" type=\"hidden\" name=\"pid_" . $p->prop_id . "\" value=\"\">";
                foreach ($p->getPropArrayValues() as $k => $v) {
                    echo "<label class=\"checkbox inline\">";
                    echo "<input id=\"pid_" . $p->prop_id . "_" . $k . "\" type=\"checkbox\" name=\"pid_" . $p->prop_id . "[]\" value=\"0\">";
                    echo "<label>" . $v . "</label></label>";
                }
                echo '</div></div>';
            }
            echo '<h3>非关键属性</h3>';

            $cri = new CDbCriteria(array(
                'condition' => 'is_key_prop=0 and is_sale_prop=0 and category_id =' . $model->category->id,
            ));
            $props = ItemProp::model()->findAll($cri);

            foreach ($props as $p) {
                echo "<div class=\"control-group \">";
                echo "<label class=\"control-label\">" . $p->prop_name . "</label><div class=\"controls\">";
                echo $p->getPropOptionValues($p->prop_name);
                echo '</div></div>';
            }
            ?>
        <?php } ?>

        <legend>商品状态</legend>
        <?php echo $form->radioButtonListInlineRow($model, 'is_show', array('1' => '是', '0' => '否'), array('lable' => '上架')); ?>
        <?php echo $form->radioButtonListInlineRow($model, 'is_promote', array('1' => '是', '0' => '否'), array('lable' => '促销')); ?>
        <?php echo $form->radioButtonListInlineRow($model, 'is_new', array('1' => '是', '0' => '否'), array('lable' => '新品')); ?>
        <?php echo $form->radioButtonListInlineRow($model, 'is_hot', array('1' => '是', '0' => '否'), array('lable' => '热卖')); ?>
        <?php echo $form->radioButtonListInlineRow($model, 'is_best', array('1' => '是', '0' => '否'), array('lable' => '精品')); ?>
<?php echo $form->radioButtonListInlineRow($model, 'is_discount', array('1' => '是', '0' => '否'), array('lable' => '会员打折')); ?>
<?php echo $form->textFieldRow($model, 'sort_order', array('lable' => '排序')); ?>

    </fieldset>
    <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => $model->isNewRecord ? '创建' : '修改')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => '重置')); ?>
    </div>
<?php $this->endWidget(); ?>