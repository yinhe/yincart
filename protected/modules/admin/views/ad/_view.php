<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ad_id), array('view', 'id'=>$data->ad_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_id')); ?>:</b>
	<?php echo CHtml::encode($data->position_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_type')); ?>:</b>
	<?php echo CHtml::encode($data->media_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_name')); ?>:</b>
	<?php echo CHtml::encode($data->ad_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_link')); ?>:</b>
	<?php echo CHtml::encode($data->ad_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_code')); ?>:</b>
	<?php echo CHtml::encode($data->ad_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_time')); ?>:</b>
	<?php echo CHtml::encode($data->start_time); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('end_time')); ?>:</b>
	<?php echo CHtml::encode($data->end_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_man')); ?>:</b>
	<?php echo CHtml::encode($data->link_man); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_email')); ?>:</b>
	<?php echo CHtml::encode($data->link_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_phone')); ?>:</b>
	<?php echo CHtml::encode($data->link_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('click_count')); ?>:</b>
	<?php echo CHtml::encode($data->click_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enabled')); ?>:</b>
	<?php echo CHtml::encode($data->enabled); ?>
	<br />

	*/ ?>

</div>