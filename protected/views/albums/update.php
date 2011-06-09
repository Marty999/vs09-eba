<?php
$this->breadcrumbs=array(
	'Albums'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Albums', 'url'=>array('index')),
	array('label'=>'Create Albums', 'url'=>array('create')),
	array('label'=>'View Albums', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Albums', 'url'=>array('admin')),
);
?>

<h1>Update Albums <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>