<?php
if (!Yii::app()->user->isGuest) {
    //kui kasutaja on bandi omanik
    if (Yii::app()->user->band->id == $model->id) {
        $this->breadcrumbs = array(
            'Minu band',
        );
    }
} else {
    $this->breadcrumbs = array(
        $model->name,
    );
}
$this->menu = array(
    array('label' => 'List Band', 'url' => array('index')),
    array('label' => 'Create Band', 'url' => array('create')),
    array('label' => 'Update Band', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Band', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Band', 'url' => array('admin')),
);
?>

<h2 id="band_name"><?=$model->name?></h2><p class="genre">(<?=$model->genre->name?>)</p>
<div class="clear"></div>
<div id="l-cont">
    <p><strong>Tutvustus</strong></p>
<!--    <p class="rating"><strong>Rating: </strong></p>-->
    <div id="editor_content"><?=$model->description?></div>
    <table>
<!--        <tr>
            <td><p><strong>Linn: </strong></p></td>
            <td><p>Tallinn</p></td>
        </tr>-->
        <tr>
            <td><p><strong>Algus aasta: </strong></p></td>
            <td><p><?=$model->activeSince?></p></td>
        </tr>
<!--        <tr>
            <td><p><strong>Koosseis: </strong></p></td>
            <td>
                <ul>
                    <li>Vello - laul</li>
                    <li>Jaan - lõõts</li>
                    <li>Pille - trummid</li>
                    <li>Heino - bass</li>
                </ul>
            </td>
        </tr>-->
        <tr>
            <td><p><strong>Koduleht: </strong></p></td>
            <td><p><a href="#"><?=$model->website?></a></p></td>
        </tr>
        <tr>
            <td><p><strong>Kontakt: </strong></p></td>
            <td><p><?=$model->email?></p></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <p>
                    <?php if($model->fb_url) echo CHtml::link(CHtml::image( Yii::app()->baseUrl . '/images/facebook.png'), $model->fb_url);  ?>
                    <?php if($model->yt_url) echo CHtml::link(CHtml::image( Yii::app()->baseUrl . '/images/youtube.png'), $model->yt_url);  ?>
                    <?php if($model->mp_url) echo CHtml::link(CHtml::image( Yii::app()->baseUrl . '/images/myspace.png'), $model->mp_url);  ?>
                </p>
            </td>
        </tr>
    </table>
    <p id="albums_title">Albumid</p>
    <p id="songs_title">Lood</p>	
    <div class="clear"></div>
    <ul id="albums">
        <li id="album-all" class="selected">Kõik lood</li>
        <li id="album-0">Album 1</li>
        <li id="album-1">Album 2</li>
        <li id="album-2">Album 3</li>
    </ul>
    <div id="songs_container">
        <ul class="songs" id="songs-1" data-id="1">
            <li>Lugu 1</li>
            <li>Lugu 1<?=CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/yt.png'),'#')?></li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
            <li>Lugu 1</li>
        </ul>
    </div>
    <div class="clear"></div>
    <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="www.eba.ee/test" num_posts="5" width="600"></fb:comments>
    <div class="clear"></div>
</div>
<div id="r-cont">
    <p><strong>Pilte: </strong></p>
    <ul>
        <?php 
            $pics = json_decode($model->pics);
        ?>
        <?php if($pics): ?>    
            <?php foreach(json_decode($model->pics) as $pic):?>
                <li><?=CHtml::link(CHtml::image( Yii::app()->baseUrl . '/' . $pic->tn),Yii::app()->baseUrl . '/' . $pic->main,array('rel'=>'colorbox'));  ?></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
<div class="clear"></div>
<script type="text/javascript">
$('#r-cont').height($('#content').height());

$("#l-cont").resize( function() {
    $('#r-cont').height($('#content').height());
});




</script>
