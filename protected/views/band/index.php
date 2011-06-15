<?php 
$this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>

<?php if(isset($_GET['search'])): ?>
    <h2>Otsing: "<?=$_GET['search']?>"</h2>
    <?php if(!$bands):?>
    <p style="margin-top: 20px;"><strong>Tulemused puuduvad, proovige uuesti!</strong></p>
    <?php endif; ?>
<?php endif; ?>
    
<ul id="bands">
    <?php foreach($bands as $band): ?>
    <li>
        <h2><?=CHtml::encode($band->name);?> <span>(<?=$band->genre->name;?>)</span></h2>
        <div class="votes" data="<?=$band->rating?>_<?=$band->id?>">
        </div>

        <div class="clear"></div>
        <div class="extra">
                <?php $pics = json_decode($band->pics); ?>
                <?php if($pics):?>
                <?php $pics = reset($pics); ?>
                    <img src="<?php echo Yii::app()->request->baseUrl.'/'.$pics->tn;?>" alt="" />
                <?php else: ?>
                    <img src="<?php echo Yii::app()->request->baseUrl.'/images/band_dummy.jpg';?>" alt="" />
                <?php endif; ?>
                <p><strong>Aasta:</strong> <?=$band->activeSince;?></p>
                <p><strong>Email:</strong> <?=$band->email;?></p>
                <p><strong>Veeb:</strong> <a href="<?=$band->website;?>" target="_blank"><?=$band->website;?></a></p>
                <div class="clear"></div>
                <p class="details-link"><a href="#"><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/css/_gfx/read_more_link.png').'Täpsemalt', array('view', 'slug'=>$band->slug)); ?></p>
        </div>
    </li>
    <?php endforeach; ?>

</ul>
