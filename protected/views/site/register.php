
<div class="form">

<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <?php echo $form->errorSummary($user); ?>
    <?php echo $form->errorSummary($band); ?>
	<p class="note">Väljad märgitud <span class="required">*</span> on kohustuslikud.</p>
          
	<div class="row">
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username'); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>
        <div class="row">
                <?php echo $form->labelEx($user,'email'); ?>
                <?php echo $form->textField($user,'email'); ?>
                <?php echo $form->error($user,'email'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password'); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'password2'); ?>
		<?php echo $form->passwordField($user,'password2'); ?>
		<?php echo $form->error($user,'password2'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($band,'name'); ?>
		<?php echo $form->textField($band,'name'); ?>
		<?php echo $form->error($band,'name'); ?>
	</div>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('.spanel select option[value="-1"]:not(:selected)').parents('select').siblings('.spanelContent').hide();
                $('.spanel select').change(function(){
                    $('.spanelContent', $(this).parents('div:first')).css('display', $(this).val()=='-1' ? 'inline':'none');        
                });
            });

        </script>


        <div class="row spanel">
            <?php echo $form->labelEx($band,'genre_id'); ?>
            <div class="hint">Kui vastavat Zanrit pole nimekirjas siis vali "-lisa uus-".</div>
            <?php echo $form->error($band,'genre_id'); ?>
            <?=$form->dropDownList($band,'genre_id',$genreList)?>
       
            <span class="spanelContent">
                <?php echo $form->labelEx($genre,'name',array('style'=>'display:inline;margin-left:20px;')); ?>
                <?php echo $form->textField($genre,'name'); ?>	
                <?php echo $form->error($genre,'name'); ?>
                <br>
            </span>  
        </div>
  
        
        <div class="row">
            <?php echo CHtml::activeLabelEx($band, 'description') ?>
            <?php echo $form->error($band,'description'); ?>
            <?php
            $this->widget('application.extensions.cleditor.ECLEditor', array(
                'model'=>$band,
                'attribute'=>'description',
            ));
            ?>
                
        </div>  
        
        
        <?php if (extension_loaded('gd')): ?>
            <div class="row">
                <?php echo CHtml::activeLabelEx($user, 'verifyCode') ?>
                <?php $this->widget('CCaptcha', array('clickableImage'=>true,'showRefreshButton'=>false,'imageOptions'=>array('class'=>'captcha'))); ?>
                <div class="hint">Kui kood pole loetav kliki sellele uue saamiseks.</div>
                <?php echo CHtml::activeTextField($user,'verifyCode',array('style'=>'display:block;')); ?>                
            </div>
        <?php endif; ?>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton('Registreeri'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->