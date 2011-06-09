<?php
$this->breadcrumbs=array(
	'Albumid'=>array('index'),
	'Muuda',
);

$this->menu=array(
	array('label'=>'List Albums', 'url'=>array('index')),
	array('label'=>'Create Albums', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('albums-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Muuda albumeid</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'albums-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'year',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
