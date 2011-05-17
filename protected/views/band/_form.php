<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'band-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'genre_id'); ?>
		<?php echo $form->textField($model,'genre_id'); ?>
		<?php echo $form->error($model,'genre_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description_short'); ?>
		<?php echo $form->textArea($model,'description_short',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description_short'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description_long'); ?>
		<?php echo $form->textField($model,'description_long'); ?>
		<?php echo $form->error($model,'description_long'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active_since'); ?>
		<?php echo $form->textField($model,'active_since'); ?>
		<?php echo $form->error($model,'active_since'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'epost'); ?>
		<?php echo $form->textField($model,'epost',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'epost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'webpage'); ?>
		<?php echo $form->textField($model,'webpage',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'webpage'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->