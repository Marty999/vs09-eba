<?php
$this->breadcrumbs=array(
	'Genres'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Genre', 'url'=>array('index')),
	array('label'=>'Create Genre', 'url'=>array('create')),
	array('label'=>'View Genre', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Genre', 'url'=>array('admin')),
);
?>

<h1>Update Genre <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>