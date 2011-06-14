<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Eesti Bandide andmebaas',
        'defaultController'=>'band',
        'language'=>'et',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'vs09',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
                        // User class
                         'class'=>'application.components.EbaWebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
                'coreMessages'=>array(
                    'basePath'=>'protected/messages',
		),
                // uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
                        'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
                                'band/details/<slug:.*?>'=>'band/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
                'contentCompactor' => array(
                    'class' => 'ext.contentCompactor.ContentCompactor',
                    'options' => array(
                        '',
                    ),
               ),
                'clientScript' => array(
                  'class' => 'ext.minify.EClientScript',
                  'combineScriptFiles' => true, // By default this is set to false, set this to true if you'd like to combine the script files
                  'combineCssFiles' => true, // By default this is set to false, set this to true if you'd like to combine the css files
                  'optimizeCssFiles' => true,  // @since: 1.1
                  'optimizeScriptFiles' => true,   // @since: 1.1
                ),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
	
		'db'=>array(
                        'class'=>'CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=eba',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
                        'enableParamLogging' => true,
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
                                        'logFile'=>'eba_log.txt'                                        
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
                                        'levels'=>'error, warning, trace',
				),
				
			),
		),
                'imagemod' => array(
                               //alias to dir, where you unpacked extension
                    'class' => 'application.extensions.imagemodifier.CImageModifier',
                ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
                //bände ühel lehel
		'bandPageSize'=>10,
	),
);