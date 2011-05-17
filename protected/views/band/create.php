<?php
$this->breadcrumbs=array(
	'Bands'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Band', 'url'=>array('index')),
	array('label'=>'Manage Band', 'url'=>array('admin')),
);
?>

<h1>Create Band</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>