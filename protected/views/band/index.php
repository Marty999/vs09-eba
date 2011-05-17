<?php
$this->breadcrumbs=array(
	'Bands',
);

$this->menu=array(
	array('label'=>'Create Band', 'url'=>array('create')),
	array('label'=>'Manage Band', 'url'=>array('admin')),
);
?>

<h1>Bands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
