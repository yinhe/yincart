<?php
//$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
//$this->breadcrumbs=array(
//	UserModule::t("Login"),
//);
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/css/screen.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/css/form.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/item.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/main.css');
?>
<div class="container">
<div class="span-12 first">
<div class="box-title3"><?php echo F::t('Dear Bamboo members, Please login')?></div>
<div class="box-content">
<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>
    
<div class="form">
<?php echo CHtml::beginForm('/user/login/ajaxLogin'); ?>
	
	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'username'); ?>
		<?php echo CHtml::activeTextField($model,'username') ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'password'); ?>
		<?php echo CHtml::activePasswordField($model,'password') ?>
	</div>
	
	<div class="row rememberMe">
		<?php echo CHtml::activeCheckBox($model,'rememberMe', array('style'=>'float:left')); ?>
		<?php echo CHtml::activeLabelEx($model,'rememberMe', array('style'=>'float:left;margin-left:3px')); ?>
	</div>
    
        <div class="clear"></div>    
        
	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Login"), array('class'=>'btn')); ?>
                <span class="hint">
		<?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
		</span>
	</div>
	
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>
</div>
</div>
<div class="span-12 last">
        <div class="box-title2"><?php echo F::t('If you are not our members, please register')?></div>
        <div class="box-content" style="line-height:24px;">
            <ul>
            <li><?php echo F::t('Tips:')?></li>
            <li><?php echo F::t('After register you can:')?></li>
            <li>1. <?php echo F::t('Save your personal information') ?></li>
            <li>2. <?php echo F::t('Collect the goods you concerned') ?></li>
            <li>3. <?php echo F::t('Enjoy the members points system') ?></li>
            <li>4. <?php echo F::t('Subscribe the  goods information of our store') ?></li>
            <li class="btn"><?php echo CHtml::link(F::t('Register'),Yii::app()->getModule('user')->registrationUrl); ?></li>
            </ul>
        </div>
</div>
</div>