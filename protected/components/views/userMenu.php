<ul>
    <li><?php echo CHtml::link('Muuda bandi',array('band/update','id'=>Yii::app()->user->band->id)); ?></li>
	<li><?php echo CHtml::link('Muuda album\'eid',array('post/admin')); ?></li>
	<li><?php echo CHtml::link('Lisa pilte',array('band/managepics')); ?></li>
	<li><?php echo CHtml::link('',array('post/admin')); ?></li>
	<li><?php echo CHtml::link('Logout',array('site/logout')); ?></li>
</ul>
        
