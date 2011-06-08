<?php
$this->breadcrumbs=array(
	'Minu bänd'=>array('view','id'=>$model->id),
	'Muuda',
);
?>

<h1>Muuda bändi "<?php echo $model->name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>