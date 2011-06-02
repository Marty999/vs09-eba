<?php
$this->breadcrumbs=array(
	'Minu bänd'=>array('view','id'=>Yii::app()->user->band->id),
	'Lisa pilte',
);
?>

<div id="uploader">
<?php
     $this->widget('application.extensions.uploadifysazilo.uploadifysaziloWidget', 
                                                array('multi'=>'true',
                                                      'uploadScript'=>Yii::app()->createUrl('band/upload',array('id'=>Yii::app()->user->band->id)), //Controller and action to be performed
                                                      'onCompleteJs'=>'loadPics();',
                                                      'buttonText'=> 'Vali failid',
                                                      'autoUpload'=>'true'));
?>

<script type="text/javascript">
    function loadPics(){
        $('#pics').load('<?=Yii::app()->createUrl('band/ajaxpics',array('id'=>Yii::app()->user->band->id));?>');
    }
    $(document).ready(function(){
    loadPics();
    });
</script>
</div>
<div id="pics">
    
</div>
<div class="clear"></div>