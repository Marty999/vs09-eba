<?php
$this->breadcrumbs=array(
	'Albums'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Albums', 'url'=>array('index')),
	array('label'=>'Create Albums', 'url'=>array('create')),
	array('label'=>'Update Albums', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Albums', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Albums', 'url'=>array('admin')),
);
?>

<h1>View Albums #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'band_id',
		'name',
		'year',
	),
)); ?>
