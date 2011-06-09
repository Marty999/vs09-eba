<div id="settings">
        <p><a href="#"><?=Yii::app()->user->band->name;?></a><?=CHtml::image(Yii::app()->baseUrl.'/images/drop.png','',array('class'=>'drop'));?></p>
        <ul id="set">
            <li><?php echo CHtml::link('Vaata bandi',array('band/view','id'=>Yii::app()->user->band->id)); ?></li>
            <li><?php echo CHtml::link('Muuda bandi',array('band/update','id'=>Yii::app()->user->band->id)); ?></li>
            <li><?php echo CHtml::link('Muuda album\'eid',array('albums/index')); ?></li>
            <li><?php echo CHtml::link('Lisa pilte',array('band/managepics')); ?></li>
            <li><?php echo CHtml::link('',array('post/admin')); ?></li>
            <li><?php echo CHtml::link('Logout',array('site/logout'),array('class'=>'logout')); ?></li>
        </ul>
</div>
