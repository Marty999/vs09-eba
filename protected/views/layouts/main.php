<!DOCTYPE HTML>
<html lang="ee-ET">
<head>
	<meta charset="UTF-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
                <?php 
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile(Yii::app()->request->baseUrl .'/css/reset.css');
        $cs->registerCssFile(Yii::app()->request->baseUrl .'/css/footer.css');
        $cs->registerCssFile(Yii::app()->request->baseUrl .'/css/main.css');
        $cs->registerCssFile(Yii::app()->request->baseUrl .'/css/form.css');
        $cs->registerCssFile(Yii::app()->request->baseUrl .'/css/notify.css');
        $cs->registerCssFile(Yii::app()->request->baseUrl .'/css/colorbox.css');
        $cs->registerCssFile(Yii::app()->request->baseUrl .'/css/jRating.jquery.css');
        $cs->registerCssFile(Yii::app()->request->baseUrl .'/css/jNotify.jquery.css');
        
        $cs->registerScriptFile(Yii::app()->request->baseUrl .'/js/jquery.colorbox.js');
        $cs->registerScriptFile(Yii::app()->request->baseUrl .'/js/jRating.jquery.js');
        $cs->registerScriptFile(Yii::app()->request->baseUrl .'/js/jquery.resize.js');
        $cs->registerScriptFile(Yii::app()->request->baseUrl .'/js/jNotify.jquery.js');

        
        
        ?>

        <link REL="SHORTCUT ICON" HREF="<?php echo Yii::app()->request->baseUrl; ?>/css/_gfx/eba.ico">
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<script type="text/javascript">
	$(document).ready(function(){

            $("a[rel='colorbox']").colorbox({
                'current': '{current}/{total}'
            });
            $("a.colorbox").colorbox();

            $('#bands LI').click(function(event){
                    //event.preventDefault();
                    $(this).addClass('active');
                    $(this).siblings().removeClass('active').find('.extra').slideUp(500);
                    $(this).find('.extra').slideDown(500);

            });
            $('#bands LI .votes').click(function(){
                return false;
            });
            
            $('#settings').click(function(){
                    if ( $('#set').css("display") == "none" ){
                            $('#set').show("fast");
                            return false;
                    }
                    else
                    $('#set').hide("fast");
            });
            $(window).click(function(){
                    $('#set').hide("fast");
            });

            $(".votes").jRating({
                bigStarsPath: '<?=Yii::app()->baseUrl?>/css/_gfx/rating/stars1.png',
                step:true,
                length : 5, 
                rateMax: 5,
                phpPath: '<?=Yii::app()->createUrl('band/rating')?>',
                onSuccess: function(){
                    window.location.reload();  
                },
                onError : function(){
                    jError(
                    'Oled selle bändi poolt juba hääletanud!',
                    {
                      autoHide : true, // added in v2.0
                      clickOverlay : false, // added in v2.0
                      MinWidth : 250,
                      TimeShown : 2000,
                      ShowTimeEffect : 400,
                      HideTimeEffect : 400,
                      LongTrip :20,
                      HorizontalPosition : 'center',
                      VerticalPosition : 'top',
                      ShowOverlay : true,
                      ColorOverlay : '#000',
                      OpacityOverlay : 0.5
                    });
                    return false;
                }
            });
            $(".vote").jRating({
                bigStarsPath: '<?=Yii::app()->baseUrl?>/css/_gfx/rating/stars.png',
                step:true,
                length : 5, 
                rateMax: 5,
                phpPath: '<?=Yii::app()->createUrl('band/rating')?>',
                 onSuccess: function(){
                    window.location.reload();  
                },
                onError : function(){
                    jError(
                    'Oled selle bändi poolt juba hääletanud!',
                    {
                      autoHide : true, // added in v2.0
                      clickOverlay : false, // added in v2.0
                      MinWidth : 250,
                      TimeShown : 2000,
                      ShowTimeEffect : 400,
                      HideTimeEffect : 400,
                      LongTrip :20,
                      HorizontalPosition : 'center',
                      VerticalPosition : 'top',
                      ShowOverlay : true,
                      ColorOverlay : '#000',
                      OpacityOverlay : 0.5
                    });
                    return false;
                }
            });

        
            $('#albums li').click(function() {                
                    $('.songs').hide('fast');
                    if($(this).hasClass('selected')){
                       $(this).removeClass('selected'); 
                    }
                    else{
                        $('#songs-'+$(this).index()).show('fast');                    
                        $(this).addClass('selected').siblings().removeClass('selected');                                             
                    }

            });
            
            $("#search-form").submit(function(){
                    if($("#search_box").val() == '') {
                    jError(
                    'Palun sisesta otsitav sõna!',
                    {
                      autoHide : true, // added in v2.0
                      clickOverlay : false, // added in v2.0
                      MinWidth : 250,
                      TimeShown : 2000,
                      ShowTimeEffect : 400,
                      HideTimeEffect : 400,
                      LongTrip :20,
                      HorizontalPosition : 'center',
                      VerticalPosition : 'top',
                      ShowOverlay : true,
                      ColorOverlay : '#000',
                      OpacityOverlay : 0.5
                    });
                            return false;
                    }
            });
	});
	
	
	</script>
</head>
<body>
<!--[if lte IE 6]><script src="<?=Yii::app()->request->baseUrl?>/js/ie6/warning.js"></script><script>window.onload=function(){e("<?=Yii::app()->request->baseUrl?>/js/ie6/")}</script><![endif]-->
<div id="wrap">
	<div id="main">
		<!-- header -->
		<div id="header">
			<div class="content">
				<div class="top">

					<a href="<?=Yii::app()->homeUrl?>"><h1><img src="<?php echo Yii::app()->request->baseUrl.'/images/logo.png';?>" /><span><?php echo CHtml::encode(Yii::app()->name); ?></span></h1></a>
                                      <?php
                                        $this->widget('zii.widgets.CMenu',array(
                                        'items'=>array(
                                          array('label'=>'Avaleht', 'url'=>array('band/index')),
                                          array('label'=>'Logi sisse', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                          array('label'=>'Registreeru', 'url'=>array('/site/register'), 'visible'=>Yii::app()->user->isGuest),                                          
                                          array('label'=>'Logi välja ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                        ),
                                        'id' => 'menu',
                                      )); ?>
					<div class="clear"></div>
				</div>
                                <?php 
                                if(!Yii::app()->user->isGuest){ 
                                    $this->widget('UserMenu');
                                }
                                ?>

                            <div id="alpha-menu">
                                <?php
                                    $data = Band::model()->listBands();
                                    $this->widget('application.extensions.alphapager.ApLinkPager',array(
                                    'pages'=>$data->alphaPages,
                                    'showNumPage' => true,
                                    'htmlOptions'=> array('class'=>false),
                                    'header' => false,
                                    'allPageLabel'=> 'Kõik',
                                    ));
                                ?>
				</div>
 
			</div>
		</div>
		
		<!-- BODY -->
		<div id="body">
			<div class="content">
                      <?php $this->renderPartial('//site/userflash'); ?>   
                      <?php echo $content; ?>
			</div>
		</div>
	</div>
</div>
<div id="footer"><p class="content">EBA 2011 Leheküle administraator: <a href="mailto:eba.loputoo@gmail.com">eba.loputoo@gmail.com</a><p></div>
</body>
</html>
