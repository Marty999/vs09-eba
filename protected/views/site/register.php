
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Väljad märgitud <span class="required">*</span> on kohustuslikud.</p>

	

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
        
        <div class="row">
		<?php echo $form->labelEx($model,'bandname'); ?>
		<?php echo $form->textField($model,'bandname'); ?>
		<?php echo $form->error($model,'bandname'); ?>
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
        
        
        <?php if (extension_loaded('gd')): ?>
            <div class="row">
                <?php echo CHtml::activeLabelEx($model, 'verifyCode') ?>
                <?php $this->widget('CCaptcha', array('clickableImage'=>true,'showRefreshButton'=>false,'imageOptions'=>array('class'=>'captcha'))); ?>
                <div class="hint">Kui kood pole loetav kliki sellele uue saamiseks.</div>
                <?php echo CHtml::activeTextField($model,'verifyCode',array('style'=>'display:block;')); ?>                
            </div>
        <?php endif; ?>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton('Registreeri'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->