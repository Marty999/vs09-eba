<div id="search">
        <?php $form=$this->beginWidget('CActiveForm', array(
                    'action' => CHtml::normalizeUrl(array('band/index')),
                    'method' => 'get',
                    'id'=>'search-form',
                    'enableClientValidation'=>false,
                    'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                    ),
            ));         
 
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'id'=>'search_box',
                'name'=>'search',
                'value'=>CHttpRequest::getParam('search',''),
                'source'=>Yii::app()->getUrlManager()->createUrl('band/autocomplete'),
                // additional javascript options for the autocomplete plugin
                'options'=>array(
                                'showAnim'=>'fold',
                ),
        ));
        
        
        ?>
        <input type="image" src="<?php echo Yii::app()->request->baseUrl.'/css/_gfx/search_submit.png'?>" id="search_submit" value="otsi" />
        <?php CHtml::ajax(array())?>
        <?php $this->endWidget();?>
</div>