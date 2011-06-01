<?php
	// Uploadify extension v 0.1a created by sazilo.com
	// I am quite lazy at commenting and organizing codes but still here's a try
	// Author : fr3ak
	// Author URL: http://www.fr3ak.com
	// Extension Name: Uploadify Salizo
	// Extension URL: http://www.fr3ak.me/uploadifysazilo
	class uploadifysaziloWidget extends CInputWidget{
		public $multi;				//Multiple support or not. Allowed value: true or false. Default value is false
		public $uploaderPath;		//Uploader swf path. The default path is extensionpath/swf/uploader.swf
		public $cancelImage;		//Cancel image used by uploadify. The default path is extensionpath/images/cancel.png
		public $uploadScript;		//Upload script should be present. It is the script(controller) that handles the main file upload event and does the takss like moving the file to respective path.
		public $uploadFolder;		//The folder where the file is to be uploaded
		public $fileDescription;	//The file description that is to be shown on the file dialog. Default value is "Image Files"
		public $fileExtension;		//The file extension allowed. Default value is "*.jpg;*.jpeg;*.gif;*.png"
		public $buttonText;			//Text to be shown in the Upload button. Default value is "Upload"
		public $simUploadLimit;		//Maximum simultaneous upload. Default value is "1"
		public $onCompleteJs;		//The javascript to be executed after successful upload withour the <script> tag.
		public $autoUpload;			//AutoUpload: Allowed true or false. Default value is true
		public $baseUrl;
		
		public function registerClientScript()
		{
			
		}
		
		public function init() {
			//Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl."jquery.uploadify.js");
			$controller=$this->controller;
			$action=$controller->action;
			
			if ($this->multi == NULL)
				$this->multi = false;
			
			if ($this->uploaderPath == NULL)
				$this->uploaderPath = CHtml::asset(dirname(__FILE__)."/views/swf/uploader.swf");
			
			if ($this->cancelImage == NULL)
				$this->cancelImage = CHtml::asset(dirname(__FILE__)."/views/images/cancel.png");
			
			if ($this->fileDescription == NULL)
				$this->fileDescription == "Image Files";
				
			if ($this->fileExtension == NULL)
				$this->fileExtension = "*.jpg;*.jpeg;*.gif;*.png";
				
			if ($this->buttonText == NULL)
				$this->buttonText = "Upload";
				
			if ($this->simUploadLimit == NULL)
				$this->simUploadLimit = 1;
			
			if ($this->onCompleteJs == NULL)
				$this->onCompleteJs = "";
			
			if ($this->autoUpload == NULL)
				$this->autoUpload = "true";
			
			$this->render('uploadifysaziloWidget',array('multi'=>$this->multi,
														'uploaderPath'=>$this->uploaderPath,
														'cancelImage'=>$this->cancelImage,
														'uploadScript'=>$this->uploadScript,
														'uploadFolder'=>$this->uploadFolder,
														'fileDescription'=>$this->fileDescription,
														'fileExtension'=>$this->fileExtension,
														'buttonText'=>$this->buttonText,
														'simUploadLimit'=>$this->simUploadLimit,
														'onCompleteJs'=>$this->onCompleteJs,
														'autoUpload'=>$this->autoUpload));
		}
	}
