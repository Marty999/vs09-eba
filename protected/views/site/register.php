<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
        <div class="row">
                <?php echo $form->labelEx($model,'email'); ?>
                <?php echo $form->textField($model,'email'); ?>
                <?php echo $form->error($model,'email'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2'); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>
        
        <?php if (extension_loaded('gd')): ?>
            <div class="row">
                <?php echo CHtml::activeLabelEx($model, 'verifyCode') ?>
            <div>
            <?php echo CHtml::activeTextField($model,'verifyCode'); ?>
            <?php $this->widget('CCaptcha'); ?>
            </div>
            <div class="hint">Letters are not case-sensitive.</div>
            </div>
        <?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Registreeri'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->