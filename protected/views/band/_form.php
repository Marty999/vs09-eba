<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'band-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Väljad märgitud <span class="required">*</span> on kohustuslikud.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

        <div class="row">
            <?php echo CHtml::activeLabelEx($model, 'description') ?>
            <?php echo $form->error($model,'description'); ?>
            <?php
            $this->widget('application.extensions.cleditor.ECLEditor', array(
                'model'=>$model,
                'attribute'=>'description',
            ));
            ?>
                
        </div> 

	<div class="row">
		<?php echo $form->labelEx($model,'activeSince'); ?>
		<?php echo $form->textField($model,'activeSince'); ?>
		<?php echo $form->error($model,'activeSince'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fb_url'); ?>
		<?php echo $form->textField($model,'fb_url',array('size'=>60)); ?>
		<?php echo $form->error($model,'fb_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'yt_url'); ?>
		<?php echo $form->textField($model,'yt_url',array('size'=>60)); ?>
		<?php echo $form->error($model,'yt_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mp_url'); ?>
		<?php echo $form->textField($model,'mp_url',array('size'=>60)); ?>
		<?php echo $form->error($model,'mp_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->