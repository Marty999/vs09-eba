<?php $this->beginContent('//layouts/main'); ?>
<div id="body">
    <div class="content">
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                        'homeLink'=>CHtml::link('Avaleht', Yii::app()->homeUrl),
                    ));
                    ?><!-- breadcrumbs -->
                <?php endif ?>
        <div class="left">
            <div class="inner">
                <?php
                    $this->widget('Search');
                ?>
            </div>
        </div>
        <div class="right">
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

