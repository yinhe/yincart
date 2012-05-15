<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pp_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pp_id), array('view', 'id'=>$data->pp_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pp_name')); ?>:</b>
	<?php echo CHtml::encode($data->pp_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />


</div>