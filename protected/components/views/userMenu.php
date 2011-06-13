<div id="settings">
        <p><a href="#"><?=Yii::app()->user->band->name;?></a><?=CHtml::image(Yii::app()->baseUrl.'/images/drop.png','',array('class'=>'drop'));?></p>
        <ul id="set">
            <li><?php echo CHtml::link('Vaata bändi',array('band/view','id'=>Yii::app()->user->band->id)); ?></li>
            <li><?php echo CHtml::link('Muuda bändi',array('band/update','id'=>Yii::app()->user->band->id)); ?></li>
            <li><?php echo CHtml::link('Halda albumeid',array('albums/index')); ?></li>
            <li><?php echo CHtml::link('Halda pilte',array('band/managepics')); ?></li>
            <li><?php echo CHtml::link('',array('post/admin')); ?></li>
            <li><?php echo CHtml::link('Logi välja',array('site/logout'),array('class'=>'logout')); ?></li>
        </ul>
</div>
