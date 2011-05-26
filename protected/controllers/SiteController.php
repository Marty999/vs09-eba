<?php

class SiteController extends Controller
{
  public $layout='//layouts/column1';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				'foreColor'=>0xb1e36e,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
                Utils::setFlash('secure', 'Olete väljalogitud!','',true);
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the register page
	 */
	public function actionRegister()
	{
		$model=new User;

                // if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
               
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->level = 0;
			if($model->validate() && $model->register()){
                                Utils::setFlash('success', 'Registreerimine õnnestus', 'Teie konto on loodud, palun vaadake oma e-posti!');
                                $this->redirect('login');
                        }
                        Utils::setFlash('error', 'Viga', 'Mõned välja on jäänud täitmata!');
		}
                
		// display the register form
		$this->render('register',array('model'=>$model));
	}
        
       public function actionTest(){
        $dataProvider=new CActiveDataProvider('User');
   
	$item_count =32;
	$page_size =2;

	$pages =new CPagination($item_count);
	$pages->setPageSize($page_size);

	// simulate the effect of LIMIT in a sql query
	$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);

	$sample =range($pages->offset+1, $end);
//
//	$this->render('basic_pager', array(
//		'item_count'=>$item_count,
//		'page_size'=>$page_size,
//		'items_count'=>$item_count,
//		'pages'=>$pages,
//		'sample'=>$sample,
//	));
            
        
        
           $this->render('//site/test',array('dataProvider'=>$dataProvider,'pages'=>$pages));
           
       }
        
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
                Yii::app()->session->open();
                Utils::setFlash('secure', 'Olete väljalogitud!','',true);
		$this->redirect(Yii::app()->homeUrl);
	}
}