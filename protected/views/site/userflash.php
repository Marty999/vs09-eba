<?php
  $baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/js/cufon-yui.js')
     ->registerScriptFile($baseUrl.'/js/colaboratelight_400.font.js');
?>
<script type="text/javascript">
        jQuery.fn.fadeThenSlideToggle = function(speed, easing, callback) {
          if (this.is(":hidden")) {
            return this.slideDown(speed, easing).fadeTo(speed, 1, easing, callback);
          } else {
            return this.fadeTo(speed, 0, easing).slideUp(speed, easing, callback);
          }
        };

    
        $(document).ready(function(){
            
            Cufon.replace('.notification strong'); 
            
            jQuery('.notification span').hover(function() {
                    jQuery(this).css('cursor','pointer');
            }, function() {
                    jQuery(this).css('cursor','auto');
            }); 
                      
            setTimeout(function(){
              jQuery('.autoclose').fadeThenSlideToggle(800);  
                
            },2000);
            
            jQuery('.notification span').click(function() {
                    jQuery(this).parents('.notification').fadeOut(800);
            }); 
        });

</script>

<div id="user-flashes">
<?php if($flashes = Yii::app()->user->getFlashes()): ?>
    <?php foreach($flashes as $key => $message):?>
    <div class="notification <?=$message['type']?> <?=$message['autoclose']?>"> 
           <?php if(!$message['autoclose']):?>
               <span></span> 
           <?php endif; ?>
            <div class="text"> 
                    <p><strong><?=$message['title']?></strong><?=$message['content']?></p> 
            </div> 
    </div>
    <?php endforeach; ?>
<?php endif;?>
</div>