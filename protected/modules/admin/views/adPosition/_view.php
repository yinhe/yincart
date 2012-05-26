<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->position_id), array('view', 'id'=>$data->position_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_name')); ?>:</b>
	<?php echo CHtml::encode($data->position_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_width')); ?>:</b>
	<?php echo CHtml::encode($data->ad_width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_height')); ?>:</b>
	<?php echo CHtml::encode($data->ad_height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_desc')); ?>:</b>
	<?php echo CHtml::encode($data->position_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_style')); ?>:</b>
	<?php echo CHtml::encode($data->position_style); ?>
	<br />


</div>