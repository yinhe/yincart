<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Registration");
$this->breadcrumbs = array(
    UserModule::t("Registration"),
);
?>

<div id="customer-register">
    <div class="row">
        <div class="span12" id="register">
            <h2 class="title"><?php echo UserModule::t("Registration"); ?></h2>

                <?php if (Yii::app()->user->hasFlash('registration')): ?>
                <div class="success">
                <?php echo Yii::app()->user->getFlash('registration'); ?>
                </div>
<?php else: ?>

                <div class="form">
                    <?php
                    $form = $this->beginWidget('UActiveForm', array(
                        'id' => 'registration-form',
                        'enableAjaxValidation' => true,
                        'disableAjaxValidationAttributes' => array('RegistrationForm_verifyCode'),
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    ));
                    ?>

                    <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

                    <?php echo $form->errorSummary(array($model, $profile)); ?>


    <?php echo $form->labelEx($model, 'username'); ?>
    <?php echo $form->textField($model, 'username', array('class' => 'text')); ?>
                    <?php echo $form->error($model, 'username'); ?>



                        <?php echo $form->labelEx($model, 'password'); ?>
                        <?php echo $form->passwordField($model, 'password', array('class' => 'text')); ?>
    <?php echo $form->error($model, 'password'); ?>
                    <p class="hint">
    <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
                    </p>



    <?php echo $form->labelEx($model, 'verifyPassword'); ?>
    <?php echo $form->passwordField($model, 'verifyPassword', array('class' => 'text')); ?>
                    <?php echo $form->error($model, 'verifyPassword'); ?>



    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email', array('class' => 'text')); ?>
                    <?php echo $form->error($model, 'email'); ?>


                    <?php
                    $profileFields = Profile::getFields();
                    if ($profileFields) {
                        foreach ($profileFields as $field) {
                            ?>
                            <div class="row">
                                <?php echo $form->labelEx($profile, $field->varname); ?>
                                <?php
                                if ($widgetEdit = $field->widgetEdit($profile)) {
                                    echo $widgetEdit;
                                } elseif ($field->range) {
                                    echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
                                } elseif ($field->field_type == "TEXT") {
                                    echo$form->textArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
                                } else {
                                    echo $form->textField($profile, $field->varname, array('class' => 'text', 'size' => 20, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
                                }
                                ?>
                            <?php echo $form->error($profile, $field->varname); ?>
                            </div>	
                            <?php
                        }
                    }
                    ?>
                        <?php if (UserModule::doCaptcha('registration')): ?>
                        <div class="row">
                            <?php echo $form->labelEx($model, 'verifyCode'); ?>

        <?php $this->widget('CCaptcha'); ?>
        <?php echo $form->textField($model, 'verifyCode', array('class' => 'text')); ?>
        <?php echo $form->error($model, 'verifyCode'); ?>

                            <p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
                                <br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
                        </div>
                        <?php endif; ?>

                    <div class="row submit">
                    <?php echo CHtml::submitButton(UserModule::t("Register"), array('class' => 'btn')); ?>
                    </div>

    <?php $this->endWidget(); ?>
                </div><!-- form -->
<?php endif; ?>


        </div><!-- #register -->
    </div><!-- .row -->
</div>