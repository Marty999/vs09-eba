<!DOCTYPE HTML>
<html lang="ee-ET">
<head>
	<meta charset="UTF-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/footer.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/notify.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.colorbox.js"></script>
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<script type="text/javascript">
	$(document).ready(function(){
	$('#bands LI').click(function(event){

		$(this).toggleClass('active');
		$(this).find('.extra').slideDown(500);
		$(this).siblings().removeClass('active').find('.extra').slideUp(500);
		
	
	});
	$("a[rel='colorbox']").colorbox({
            'current': '{current}/{total}'
        });
	
	});
	
	
	</script>
</head>
<body>
<div id="wrap">
	<div id="main">
		<!-- header -->
		<div id="header">
			<div class="content">
				<div class="top">

					<a href="<?=Yii::app()->homeUrl?>"><h1><img src="<?php echo Yii::app()->request->baseUrl.'/images/logo.png';?>" /><span><?php echo CHtml::encode(Yii::app()->name); ?></span></h1></a>
                                      <?php
                                        $userband = false;
                                        $userband_id = false;
                                        if(!Yii::app()->user->isGuest){

                                                $userband = Yii::app()->user->band->name; 
                                                $userband_id =Yii::app()->user->band->id;
                                        }
                                        $this->widget('zii.widgets.CMenu',array(
                                        'items'=>array(
                                          array('label'=>'Avaleht', 'url'=>array('band/index')),
                                          array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                                          array('label'=>'Contact', 'url'=>array('/site/contact')),
                                          array('label'=>'Logi sisse', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                          array('label'=>'Registreeri', 'url'=>array('/site/register'), 'visible'=>Yii::app()->user->isGuest),
                                          array('label'=>'Minu Band ('.$userband.')', 'url'=>array('/band/view', 'id'=>$userband_id), 'visible'=>!Yii::app()->user->isGuest),
                                          array('label'=>'Logi välja ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                        ),
                                        'id' => 'menu',
                                      )); ?>
					<div class="clear"></div>
				</div>
                            <?php if($this->getId() == 'band'): ?>
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
                            <?php endif; ?>
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
<div id="footer"><p class="content">#Footer<p></div>	
</body>
</html>
