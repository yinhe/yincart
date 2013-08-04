<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Restore");
$this->breadcrumbs = array(
    UserModule::t("Login") => array('/user/login'),
    UserModule::t("Restore"),
);
?>

<div id="customer-login">
    <div class="row">
        <div class="span7" style="display: block;" id="recover-password">
      <h2><?php echo UserModule::t("Restore"); ?></h2>

                <?php if (Yii::app()->user->hasFlash('recoveryMessage')): ?>
                <div class="success">
                <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
                </div>
<?php else: ?>

                <div class="form">
                    <?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($form); ?>

                    <div class="row">
                        <?php echo CHtml::activeLabel($form, 'login_or_email'); ?>
    <?php echo CHtml::activeTextField($form, 'login_or_email', array('class' => 'text')) ?>
                        <p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>
                    </div>

                    <div class="row submit">
    <?php echo CHtml::submitButton(UserModule::t("Restore"), array('class' => 'btn')); ?>
                    </div>

                <?php echo CHtml::endForm(); ?>
                </div><!-- form -->
<?php endif; ?>

        </div>
    </div>
</div>
