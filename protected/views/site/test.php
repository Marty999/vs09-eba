<?php


$this->widget('CLinkPager', array(
	'pages'=>$pages,
));

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'enablePagination'=>true,
    'pager'=>array('class'=>'CLinkPager'),
));
?>
