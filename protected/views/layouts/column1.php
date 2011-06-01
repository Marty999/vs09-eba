<?php $this->beginContent('//layouts/main'); ?>
<div id="body">
    <div class="content">
             <?php if(isset($this->breadcrumbs)):?>
                            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                                    'links'=>$this->breadcrumbs,
                                    'homeLink'=>CHtml::link('Avaleht', Yii::app()->homeUrl),
                            )); ?><!-- breadcrumbs -->
                    <?php endif?>
        <div class="main">
            <div class="top"></div>
                <div id="content">
                    <?php echo $content; ?>
                </div>
            <div class="bottom"></div>
        </div>
        <div id="clear"></div>
    </div>
</div>
<?php $this->endContent(); ?>
