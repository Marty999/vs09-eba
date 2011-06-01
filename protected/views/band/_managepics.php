<?php

     $pics = json_decode($pics);
     $items = array();
     ?>
    <ul id="pic-list">
     <?php
     if($pics){
         foreach($pics as $id=>$pic){

             $items[] = '<li>'.CHtml::image(Yii::app()->baseUrl.'/'.$pic->tn).
                     CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/delete.png'),
                                Yii::app()->createUrl('band/deletepic',
                                        array('id'=>Yii::app()->user->band->id,'pic'=>$id)
                                        ),array('confirm'=>'Kas oled kindel?')).'</li>';

         }
         echo implode('',$items);
     } 
    ?>
     <div class="clear"></div> 
     </ul>
