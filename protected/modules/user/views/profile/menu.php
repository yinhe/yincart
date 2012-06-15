<ul class="actions">
<?php 
if(Yii::app()->user->name == 'admin') {
?>
<li><?php echo CHtml::link(UserModule::t('Manage User'),array('/admin')); ?></li>
<li>=======</li>
<?php
}
?>
<li><?php echo CHtml::link(UserModule::t('Profile'),array('/user/profile')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Edit'),array('/user/profile/edit')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Change password'),array('/user/profile/changepassword')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Logout'),array('/user/logout')); ?></li>
</ul>