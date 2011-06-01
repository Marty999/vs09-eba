<?php
 if(!Yii::app()->user->isGuest){
	//kui kasutaja on bandi omanik
	if(Yii::app()->user->band->id == $model->id){
		$this->breadcrumbs=array(
				'Minu band',
		);    
		$this->widget('UserMenu');
     }
 }else{
    $this->breadcrumbs=array(
            $model->name,
    );
 }
$this->menu=array(
	array('label'=>'List Band', 'url'=>array('index')),
	array('label'=>'Create Band', 'url'=>array('create')),
	array('label'=>'Update Band', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Band', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Band', 'url'=>array('admin')),
);
?>



<h2 id="band_name"><?=$model->name?></h2><p id="genre">(Rock)</p>
<div class="clear"></div>
<div id="t">
        <div id="lt">
                <p><strong>Tutvustus</strong></p>
                <p class="rating"><strong>Rating: </strong></p>

                <div id="editor_content"><?=$model->description?></div>
                <table>
                        <tr>
                                <td><p><strong>Linn: </strong></p></td>
                                <td><p>Tallinn</p></td>
                        </tr>
                        <tr>
                                <td><p><strong>Algus aasta: </strong></p></td>
                                <td><p><?=$model->activeSince?></p></td>
                        </tr>
                        <tr>
                                <td><p><strong>Koosseis: </strong></p></td>
                                <td>
                                        <ul>
                                                <li>Vello - laul</li>
                                                <li>Jaan - lõõts</li>
                                                <li>Pille - trummid</li>
                                                <li>Heino - bass</li>
                                        </ul>
                                </td>
                        </tr>
                        <tr>
                                <td><p><strong>Koduleht: </strong></p></td>
                                <td><p><a href="#"><?=$model->website?></a></p></td>
                        </tr>
                        <tr>
                                <td><p><strong>Kontakt: </strong></p></td>
                                <td><p>band@muusika.ee</p></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>
                                        <p>
                                                <?=CHtml::link(CHtml::image( Yii::app()->baseUrl . '/images/facebook.png'), '#');  ?>
                                                <?=CHtml::link(CHtml::image( Yii::app()->baseUrl . '/images/youtube.png'), '#');  ?>
                                                <?=CHtml::link(CHtml::image( Yii::app()->baseUrl . '/images/myspace.png'), '#');  ?>
                                        </p>
                                </td>
                        </tr>
                </table>
        </div>
        <div id="rt">
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
</div>
<div id="b">
        <div id="lb">
                <p><strong>Lood albumist "Album 1"</strong></p>
                <ul>
                        <li>Lugu 1</li>
                        <li>Lugu 2</li>
                        <li>Lugu 3</li>
                        <li>Lugu 4</li>
                </ul>
        </div>
        <div id="rb">
                <p><strong>Albumid: </strong></p>
                <ul>
                        <li><a href="#">Album 1</a></li>
                        <li><a href="#">Album 2</a></li>
                        <li><a href="#">Album 3</a></li>
                        <li><a href="#">Album 4</a></li>
                </ul>
        </div>
        <div class="clear"></div>
</div>
<script type="text/javascript">
        $('#rt').height($('#t').height());
        $('#rb').height($('#b').height());
</script>
<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="www.eba.ee/test" num_posts="5" width="934"></fb:comments>

