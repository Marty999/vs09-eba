<?php

class AlbumsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'playyoutube' ,'view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Albums;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Albums']))
		{
			$model->attributes=$_POST['Albums'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Albums']))
		{
			$model->attributes=$_POST['Albums'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{

			$this->loadModel($id)->delete();
                        $this->redirect(array('albums/index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{   
		$newAlbum=new Albums;
                $newSong = new Songs;

		if(isset($_POST['Albums']))
		{
			$newAlbum->attributes=$_POST['Albums'];
                        $newAlbum->band_id = Yii::app()->user->band->id;
			if($newAlbum->save())
                                $newAlbum->unsetAttributes();
				
		}
                
                if(isset($_POST['Songs']))
		{
			$newSong->attributes=$_POST['Songs'];
			if($newSong->save())
                                $newSong->unsetAttributes();
				
		}
                
                $this->layout = '//layouts/column1';
		$model = Albums::model()->with('songs')->findAllByAttributes(array('band_id'=>Yii::app()->user->band->id));
                $albumList = array();
                if($model){
                    foreach($model as $val){
                        $albumList[$val->id] = $val->name;
                    }
                }
		$this->render('index',array(
			'model'=>$model,
			'newAlbum'=>$newAlbum,
			'newSong'=>$newSong,
			'albumList'=>$albumList,
                            )       
                );
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Albums('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Albums']))
			$model->attributes=$_GET['Albums'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Albums::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='albums-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function actionPlayYoutube($url)
	{
            $this->renderPartial('_youtube',array('url'=>$url));
	}
}
