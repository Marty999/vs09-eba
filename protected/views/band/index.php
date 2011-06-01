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
        <p class="votes">
            <?php $this->widget('CStarRating',array(
                'model'=>'Band',
                'attribute'=>'rating',
                'name'=>'rating-'.$band->id,
                'id'=>'rating-'.$band->id,
                'titles'=>false,
                'readOnly'=>true,
                'value'=>intval($band->rating),
                'callback'=>'
                    function(){
                    var item = "#rating-'.$band->id.' > input";
                    $.ajax({
                        type: "POST",
                        url: "'.Yii::app()->createUrl('band/rating').'",
                        data: "id='.$band->id.'&rate=" + $(this).val(),
                        success: function(res){
                            alert(res);
                            jQuery(item).rating("value",res);
                             
                        
                    }})}'
            ));?>
        </p>
        <div class="clear"></div>
        <div class="extra">
                <img src="<?php echo Yii::app()->request->baseUrl.'/images/band_dummy.jpg';?>" alt="" />
                <p><strong>Aasta:</strong> <?=$band->activeSince;?></p>
                <p><strong>Email:</strong> <?=$band->email;?></p>
                <p><strong>Veeb:</strong> <?=$band->website;?></p>
                <p><strong>Aasta:</strong> 1987</p>
                <div class="clear"></div>
                <p class="details-link"><a href="#"><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/css/_gfx/read_more_link.png').'Täpsemalt', array('view', 'id'=>$band->id)); ?></p>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
