<?php
$this->breadcrumbs=array(
	'Minu bänd'=>array('view','id'=>$model->id),
	'Muuda',
);

$this->menu=array(
	array('label'=>'List Band', 'url'=>array('index')),
	array('label'=>'Create Band', 'url'=>array('create')),
	array('label'=>'View Band', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Band', 'url'=>array('admin')),
);
?>

<h1>Muuda bändi "<?php echo $model->name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>