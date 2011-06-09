<?php
$this->breadcrumbs=array(
	'Minu bänd'=>array('band/view','id'=>Yii::app()->user->band->id),
	'Albumid',
);


$this->menu=array(
	array('label'=>'Lisa uus', 'url'=>array('create')),
	array('label'=>'Manage Albums', 'url'=>array('admin')),
);
?>


<!--
<p><strong>Lisa album</strong></p>
<label>Albumi nimi</label>
<input type="text">

<label>Aasta</label>
<input type="text">
<input type="submit" value="Lisa">	-->
<div id="albums_form">
    <div class="form">
    <h1>Lisa album</h1>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'albums-form',
        'enableAjaxValidation'=>false,
    )); ?>
    
        <div class="row">
            <?php echo $form->labelEx($newAlbum,'name'); ?>
            <?php echo $form->textField($newAlbum,'name',array('maxlength'=>255)); ?>
            <?php echo $form->error($newAlbum,'name'); ?>
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($newAlbum,'year'); ?>
            <?php echo $form->textField($newAlbum,'year'); ?>
            <?php echo $form->error($newAlbum,'year'); ?>
        </div>
    
        <div class="row buttons">
            <?php echo CHtml::submitButton($newAlbum->isNewRecord ? 'Lisa' : 'Muuda'); ?>
        </div>
    
    <?php $this->endWidget(); ?>
    
    </div><!-- form -->
    <?php if($model): ?>
    <div class="form">
    <h1>Lisa lugu</h1>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'songs-form',
        'enableAjaxValidation'=>false,
    )); ?>
        
        <div class="row">
            <?php echo $form->labelEx($newSong,'album_id'); ?>
            <?=$form->dropDownList($newSong,'album_id',$albumList)?>
            <?php echo $form->error($newSong,'album_id'); ?>
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($newSong,'name'); ?>
            <?php echo $form->textField($newSong,'name',array('maxlength'=>255)); ?>
            <?php echo $form->error($newSong,'name'); ?>
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($newSong,'yt_url'); ?>
            <?php echo $form->textField($newSong,'yt_url'); ?>
            <?php echo $form->error($newSong,'yt_url'); ?>
        </div>
    
        <div class="row buttons">
            <?php echo CHtml::submitButton($newAlbum->isNewRecord ? 'Lisa' : 'Muuda'); ?>
        </div>
    
    <?php $this->endWidget(); ?>
    
    </div><!-- form -->
    <?php endif; ?>
    <div class="clear"></div>
</div>
<?php if($model): ?>
<table id="album-change">
        <tr>
                <td class="album1"><strong>Album</strong></td>
                <td class="year1"><strong>Aasta</strong></td>
                <td class="activity1"><strong>Tegevus</strong></td>

        </tr>
    <?php foreach($model as $album): ?>
        <tr>
            <td class="album"><?=$album->name;?>
                <?php if($album->songs): ?>
                    <p class="pk"><strong>Lood:</strong></p>
                    <?php foreach($album->songs as $song): ?>
                    <p><?=$song->name;?></p>
                    
                    <?php endforeach; ?>
                <?php endif; ?>
            </td>
            <td class="year"><?=$album->year;?></td>
            <td class="activity">
                <?=CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/vaata.png','vaata'),'#',array('title'=>'vaata'));?>
                <?=CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/muuda.png'),'#',array('title'=>'muuda'));?>
                <?=CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/kustuta.png'),Yii::app()->createUrl('albums/delete',array('id'=>$album->id)),array('title'=>'kustuta','confirm'=>'Kas oled kindel?'));?>
            </td>

        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>