<?php 
$this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>

<?php if(isset($_GET['search'])): ?>
    <h2>Otsing: "<?=$_GET['search']?>"</h2>
<?php endif; ?>
    
<ul id="bands">
    <?php foreach($bands as $band): ?>
    <li>
        <h2><?=$band->name;?> <span>(<?=$band->genre->name;?>)</span></h2>
        <div id="votes-<?=$band->id?>" class="stat">
        <div class="statVal">
            <span class="ui-rater">
                <span class="ui-rater-starsOff" style="width:90px;"><span class="ui-rater-starsOn" style="width:<?=intval($band->rating*18)?>px"></span></span>
                <span class="ui-rater-rating"><?=$band->rating?></span>&#160;(<span class="ui-rater-rateCount">2</span>)
            </span>
        </div>

        <div class="clear"></div>
        <div class="extra">
                <?php $pics = json_decode($band->pics,true); ?>
                <?php if($pics):?>
                    <img src="<?php echo Yii::app()->request->baseUrl.'/'.$pics[0]['tn'];?>" alt="" />
                <?php else: ?>
                    <img src="<?php echo Yii::app()->request->baseUrl.'/images/band_dummy.jpg';?>" alt="" />
                <?php endif; ?>
                <p><strong>Aasta:</strong> <?=$band->activeSince;?></p>
                <p><strong>Email:</strong> <?=$band->email;?></p>
                <p><strong>Veeb:</strong> <?=$band->website;?></p>
                <p><strong>Aasta:</strong> <?=$band->activeSince;?></p>
                <div class="clear"></div>
                <p class="details-link"><a href="#"><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/css/_gfx/read_more_link.png').'Täpsemalt', array('view', 'id'=>$band->id)); ?></p>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
