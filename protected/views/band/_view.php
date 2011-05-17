<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genre_id')); ?>:</b>
	<?php echo CHtml::encode($data->genre_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_short')); ?>:</b>
	<?php echo CHtml::encode($data->description_short); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_long')); ?>:</b>
	<?php echo CHtml::encode($data->description_long); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active_since')); ?>:</b>
	<?php echo CHtml::encode($data->active_since); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('epost')); ?>:</b>
	<?php echo CHtml::encode($data->epost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('webpage')); ?>:</b>
	<?php echo CHtml::encode($data->webpage); ?>
	<br />

	*/ ?>

</div>