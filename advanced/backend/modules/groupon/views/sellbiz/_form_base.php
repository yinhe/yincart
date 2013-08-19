<?php echo $form->textFieldRow($model,'title',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model,'contact',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model,'phone',array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model,'mobile',array('class'=>'span3')); ?>
<?php echo $form->fileFieldRow($model, 'license_photo'); ?>
<?php if(!empty($model->license_photo)): ?>
    <?php // echo H::hiddenField('ARBiz[license_photo]', $model->license_photo)?>
    <?php echo H::image($model->photoPath, '', array('width'=>200))?>
    <p style="color:teal;">如果图片不修改，则不需要上传新图片,图片上传类型支持'jpg', 'gif', 'jpeg'</p>
<?php endif; ?>
