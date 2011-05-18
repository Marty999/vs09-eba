<?php
$this->breadcrumbs=array(
	'Bands'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Band', 'url'=>array('index')),
	array('label'=>'Create Band', 'url'=>array('create')),
	array('label'=>'Update Band', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Band', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Band', 'url'=>array('admin')),
);
?>

<h1>View Band #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'genre_id',
		'name',
		'description',
		'activeSince',
		'website',
		'email',
	),
)); ?>
