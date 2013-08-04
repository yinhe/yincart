<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Restore");
$this->breadcrumbs = array(
    UserModule::t("Login") => array('/user/login'),
    UserModule::t("Restore"),
);
?>

<h3><?php echo UserModule::t("Restore"); ?></h3>

<?php if (Yii::app()->user->hasFlash('recoveryMessage')): ?>
    <div class="success">
        <?php //echo Yii::app()->user->getFlash('recoveryMessage'); ?>
        <?php
        $this->widget('bootstrap.widgets.TbAlert', array(
            'block' => true, // display a larger alert block?
            'fade' => true, // use transitions?
            'closeText' => '&times;', // close link text - if set to false, no close link is displayed
            'alerts' => array(// configurations per alert type
                'recoveryMessage' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
            ),
        ));
        ?>
    </div>
<?php else: ?>

    <div class="form">
        <?php echo CHtml::beginForm(); ?>

        <?php echo CHtml::errorSummary($form, '请更正以下错误：', '', array('class' => 'text-error')); ?>
        <div class="control-group">
            <?php echo CHtml::activeLabel($form, 'login_or_email'); ?>
            <?php echo CHtml::activeTextField($form, 'login_or_email') ?>
            <p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>
        </div>

        <div class="form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => UserModule::t("Restore"),
            ));
            ?>
        </div>

        <?php echo CHtml::endForm(); ?>
    </div><!-- form -->
<?php endif; ?>