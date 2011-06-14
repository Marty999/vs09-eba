<?php
if (!Yii::app()->user->isGuest) {
    //kui kasutaja on bandi omanik
    if (Yii::app()->user->band->id == $model->id) {
        $this->breadcrumbs = array(
            'Minu bänd',
        );
    }
} else {
    $this->breadcrumbs = array(
        $model->name,
    );
}

$this->pageTitle = 'Eesti bändide andmebaas - '.$model->name;

?>

<h2 id="band_name"><?=$model->name?></h2><p class="genre">(<?=$model->genre->name?>)</p>
<div class="clear"></div>
<div id="l-cont">
    <p><strong>Tutvustus</strong></p>
    <div class="vote" data="<?=$model->rating;?>_<?=$model->id?>"></div>
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
            <td><p><a href="<?=$model->website?>" target="_blank"><?=$model->website?></a></p></td>
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
    <?php if($model->albums): ?>
    <div id="albums_container">
    <p id="albums_title">Albumid</p>
    <p id="songs_title">Lood</p>	
    <div class="clear"></div>
    <ul id="albums">
        
        <?php $songs = '';?>
        <?php foreach($model->albums as $key=>$album):?>
        <li><?=$album->name?></li>
            <?php $songs .='<ul id="songs-'.$key.'" class="songs">'; ?>
            <?php foreach($album->songs as $song): ?>
                <?php $songs .= '<li>'.$song->name; ?>
                <?php if($song->yt_url):?>
                    <?php $songs .= CHtml::link(CHtml::image( Yii::app()->baseUrl . '/images/yt.png'),Yii::app()->createUrl('albums/playyoutube',array('url'=>$song->yt_url)),array('class'=>'colorbox'));  ?>
                <?php endif;?>
                <?php $songs .='</li>';?>
            <?php endforeach; ?>
            <?php $songs .= '</ul>';?>
        <?php endforeach;?>
    </ul>
    <div id="songs_container">
        <?=$songs?>
    </div>
    <div class="clear"></div>
    </div>
    <?php endif;?>
    <div class="clear"></div>
    <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?=Yii::app()->createAbsoluteUrl('band/view',array('id'=>$model->id))?>" num_posts="5" width="600"></fb:comments>
    <div class="clear"></div>
</div>
<div id="r-cont">
    <p><strong>Pilte: </strong></p>
    <ul>

        <?php if($model->pics): ?>    
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
    $('#r-cont').height($('#l-cont').height());
});




</script>
