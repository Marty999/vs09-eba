<?php
$this->breadcrumbs=array(
	'Minu bänd'=>array('view','id'=>Yii::app()->user->band->id),
	'Lisa pilte',
);
?>

<style type="text/css">
         .fileUploadQueueItem {
  background-color: #F5F5F5;
  border: 2px solid #E5E5E5;
  font: 11px Verdana, Geneva, sans-serif;
  margin-top: 5px;
  padding: 10px;
  width: 350px;
}
 .uploadifyError {
  background-color: #FDE5DD !important;
  border: 2px solid #FBCBBC !important;
}
 .fileUploadQueueItem .cancel {
  float: right;
}
 .fileUploadQueueItem .completed {
  background-color: #E5E5E5;
}
 .fileUploadProgress {
  background-color: #E5E5E5;
  margin-top: 10px;
  width: 100%;
}
 .fileUploaProgressBar {
  background-color: #0099FF;
  height: 3px;
  width: 1px;
}				
</style>

<?php
     $this->widget('application.extensions.uploadifysazilo.uploadifysaziloWidget', 
                                                array('multi'=>'true',
                                                      'uploadScript'=>Yii::app()->createUrl('band/upload',array('id'=>Yii::app()->user->band->id)), //Controller and action to be performed
                                                      'onCompleteJs'=>'alert(response);',
                                                      'buttonText'=> 'Vali failid',
                                                      'autoUpload'=>'true'));
     
     
     $pics = json_decode($pics);
     foreach($pics as $pic){
         
         echo CHtml::image($pic);
    
     }
     ?>
