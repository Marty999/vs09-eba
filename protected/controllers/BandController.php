<?php

class BandController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $breadcrumbs = array();
        
        //kui esitähe järgi valida band siis koristame otsingu ja muud hackid
        public function createUrl($route,$params=array(),$ampersand='&')
	{
            if (isset($params['alpha'])){
            unset($params['search']);
            }  
            if (isset($params['p_rst'])){
             $route = 'band/index';   
            }
		
		return parent::createUrl($route, $params, $ampersand);
	}
        
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

				'actions'=>array('index','view','autocomplete','rating','upload','ajaxpics','byname'),

				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','managepics','deletepic'),
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
        
        
        /*
         * Autocomplete otsingu jaoks
         */
         public function actionAutocomplete() {
            $res =array();

            if (isset($_GET['term'])) {
                    // http://www.yiiframework.com/doc/guide/database.dao
                    $qtxt ="SELECT name,id FROM tbl_band WHERE name LIKE :name";
                    $command =Yii::app()->db->createCommand($qtxt);
                    $command->bindValue(":name", '%'.$_GET['term'].'%', PDO::PARAM_STR);
                    $res =$command->queryColumn();
            }

            echo CJSON::encode($res);
            Yii::app()->end();
        }
        
        /*
         * Rating
         * 
         */
         public function actionRating() {
             
             if (isset($_POST['idBox']) && isset($_POST['rate']) && $_POST['rate'] <= 5) {
                 if(!empty(Yii::app()->request->cookies['eba_vote']->value)){
                     $cookie = json_decode(Yii::app()->request->cookies['eba_vote']->value);
                     if(!in_array($_POST['idBox'], $cookie)){
                         $cookie[] = $_POST['idBox'];
                         $cookie = json_encode($cookie);
                         Yii::app()->request->cookies['eba_vote'] = new CHttpCookie('eba_vote', $cookie);
                     }else{
                         $error['error'] = true;
                         $error['message'] = 'Oled juba hääletanud selle bändi poolt';
                     }
                     
                 }else{
                         $cookie[] = $_POST['idBox'];
                         $cookie = json_encode($cookie);
                         Yii::app()->request->cookies['eba_vote'] = new CHttpCookie('eba_vote', $cookie);
                                             
                 }
             }
             if(isset($error)){
                 echo json_encode($error);
             }else{
                     $band = $this->loadModel($_POST['idBox']);
                     $band->rate_count +=1;
                     if($band->rating > 0){
                        $band->rating = ($_POST['rate']+($band->rating*($band->rate_count-1)))/$band->rate_count;
                     }
                     else{
                         $band->rating = $_POST['rate'];
                     }
                     $band->save(false);

                     echo intval($band->rating);
                 echo 1;
             }
             

         }
         
         /*
          * autocompletest suunamine
          * 
          */
         public function actionByname($name){
            
           Yii::import('ext.behaviors.slug.Doctrine_Inflector');
            
            $this->redirect($this->createUrl('band/view',array('slug'=>Doctrine_Inflector::urlize($name))));    
             
         }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($slug)
	{
                $this->layout='//layouts/column1';
                $band = Band::model()->findByAttributes(array('slug'=>$slug));
                if($band===null)
			throw new CHttpException(404,'Sellist bändi ei eksisteeri.');
                
		$this->render('view',array(
			'model'=>$band,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Band;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Band']))
		{
			$model->attributes=$_POST['Band'];
                        $model->user_id = Yii::app()->user->id;
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
                $this->layout = '//layouts/column1'; 
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Band']))
		{
			$model->attributes=$_POST['Band'];
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

            $data = Band::model()->listBands(CHttpRequest::getParam('search',''));
  
            $this->render('index', array(
                'bands' => $data->bands,
                 'pages' => $data->pages
            ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Band('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Band']))
			$model->attributes=$_GET['Band'];

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
		$model=Band::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='band-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        /**
	 *Faili upload
	 */
	public function actionUpload()
	{          
             Yii::log('post'.var_dump($_POST), 'error', 'upload files');
            if (!empty($_FILES)) {
                
                $folder = 'uploads/band/'.CHttpRequest::getParam('id');
                $name = uniqid();

                $img = Yii::app()->imagemod->load($_FILES['Filedata']);

                //main pic
                    Yii::log('Fail olemas'.$img->file_max_size, 'error', 'upload files');
                if ($img->uploaded) {
                    
                    $img->image_convert         = 'jpg';
                    $img->jpeg_quality          = 80;
                    $img->image_resize          = true;
                    $img->image_ratio_y         = true;
                    $img->image_x               = 640;
                    $img->file_new_name_body = $name;
                    $img->process($folder);
                    if ($img->processed) {
                     
                        $url_big = str_replace('\\','/',$img->file_dst_pathname) ;
                        $img->clean();

                        //thumbnail
                        Yii::log('Fail olemas'.$img->error, 'error', 'upload files error');
                        $img = Yii::app()->imagemod->load($url_big);
                        $img->image_resize          = true;
                        $img->image_ratio_crop      = true;
                        $img->image_x               = 130;
                        $img->image_y               = 100;
                        $img->file_new_name_body = $name;
                        $img->process($folder.'/tn');
                        if($img->processed){                            
                                $url_tn = str_replace('\\','/',$img->file_dst_pathname);

                                $model = Band::model()->findByPk(CHttpRequest::getParam('id'));
                                if(strlen($model->pics) == 0){
                                $pics = array();
                            }
                            else{
                                $pics = json_decode($model->pics,true);
                            }
                            array_push($pics,array('main'=>$url_big,'tn'=>$url_tn,));
                            $model->pics = json_encode($pics);
                           if ($model->save(false))
                                   echo 1;
                            
                        }
                        else{
                            
                            Yii::log('Pildi thumbnaili error:'.$img->error, 'error', 'upload'); 

                        }
                    }else{
                        
                        Yii::log('Pildi töötlemise error:'.$img->error, 'error', 'upload');
                    }
                }else{
                    
                        Yii::log('Pildi uploadi error:'.$img->error, 'error', 'upload');
                }
            }
	}
        
	public function actionManagepics()
	{
           
            $this->layout = '//layouts/column1';          
            $this->render('managepics');
	}
        
        public function actionAjaxpics()
	{           
            $model = Band::model()->findByPk(Yii::app()->user->band->id);
            $this->renderPartial('_managepics',array('pics'=>$model->pics));
	}
        
        public function actionDeletepic()
	{   
            if(isset($_GET['pic'])){
                $model = Band::model()->findByPk(Yii::app()->user->band->id);
                $pics = json_decode($model->pics,true);
     
                unlink(dirname(Yii::app()->request->scriptFile).'/'.$pics[$_GET['pic']]['main']);
                unlink(dirname(Yii::app()->request->scriptFile).'/'.$pics[$_GET['pic']]['tn']);
                unset($pics[$_GET['pic']]);
                $model->pics = json_encode($pics);
                $model->save(false);
                
                Utils::setFlash('success', 'Pilt kustutatud','',true);
                $this->redirect(array('managepics'));
            }
            
                       
	}
        


}
