<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
$backend = dirname(dirname(__FILE__));
$frontend = dirname($backend);
$root = dirname($frontend);
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('frontend', $frontend);
Yii::setPathOfAlias('backend', $backend);
Yii::setPathOfAlias('bootstrap', $frontend . DIRECTORY_SEPARATOR . 'extensions' . DIRECTORY_SEPARATOR . 'bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => $frontend,
    'name' => '后台管理系统',
    'language' => 'zh_cn',
    'theme' => 'backend',
    'controllerPath' => $backend . '/controllers',
    'viewPath' => $backend . '/views',
    'runtimePath' => $backend . '/runtime',
    // preloading 'log' component
    'preload' => array('log', 'bootstrap'),
    // autoloading model and component classes
    'import' => array(
	'backend.models.*',
	'backend.components.*',
	'application.models.*',
	'application.components.*',
	'application.modules.user.models.*',
    ),
    'modules' => array(
	// uncomment the following to enable the Gii tool
	'gii' => array(
	    'class' => 'system.gii.GiiModule',
	    'password' => '123',
	    // If removed, Gii defaults to localhost only. Edit carefully to taste.
	    'ipFilters' => array('127.0.0.1', '::1'),
	),
	'auth' => array(
	    'class' => 'backend.modules.auth.AuthModule' // Path to module in backend.
	),
	// uncomment the following to enable the Gii tool
	'cms' => array(
	    'class' => 'application.modules.cms.CmsModule',
	),
	'mall' => array(
	    'class' => 'application.modules.mall.MallModule',
	),
	'user' => array(
	    'class' => 'application.modules.user.UserModule',
	),
	'cck' => array(
	    'class' => 'application.modules.cck.CckModule',
	),
    ),
    // application components
    'components' => array(
	'user' => array(
	    // enable cookie-based authentication
	    'allowAutoLogin' => true,
	    'loginUrl' => array('/site/login'),
	    'stateKeyPrefix' => 'back_',
	    'class' => 'auth.components.AuthWebUser',
	),
	'themeManager' => array(
	    'basePath' => $root . '/themes',
	),
	// uncomment the following to enable URLs in path-format
	'authManager' => array(
	    'class' => 'CDbAuthManager', // Provides support authorization item sorting.
	    'connectionID' => 'db',
	    'itemTable' => '{{authitem}}',
	    'itemChildTable' => '{{authitemchild}}',
	    'assignmentTable' => '{{authassignment}}',
	    'behaviors' => array(
		'auth' => array(
		    'class' => 'auth.components.AuthBehavior',
		    'admins' => array('admin'), // users with full access
		),
	    ),
	),
	// uncomment the following to enable URLs in path-format
	'urlManager' => array(
	    'urlFormat' => 'path',
//            'showScriptName' => false,
	    'rules' => array(
		'<_c:\w+>/<id:\d+>' => '<_c>/view',
		'<_c:\w+>/<_a:\w+>/<id:\d+>' => '<_c>/<_a>',
		'<_c:\w+>/<_a:\w+>' => '<_c>/<_a>',
	    ),
	),
	'cache' => array(
	    'class' => 'system.caching.CFileCache',
	),
	'settings' => array(
	    'class' => 'frontend.extensions.CmsSettings',
	    'cacheComponentId' => 'cache',
	    'cacheId' => 'global_website_settings',
	    'cacheTime' => 0,
	    'tableName' => '{{settings}}',
	    'dbComponentId' => 'db',
	    'createTable' => true,
	    'dbEngine' => 'InnoDB',
	),
	'bootstrap' => array(
	    'class' => 'bootstrap.components.Bootstrap',
	    'responsiveCss' => true,
	    'fontAwesomeCss' => true,
//            'enableCdn' => true,
	),
//        'db' => array(
//            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
//        ),
	// uncomment the following to use a MySQL database
	/*
	  'db'=>array(
	  'connectionString' => 'mysql:host=localhost;dbname=testdrive',
	  'emulatePrepare' => true,
	  'username' => 'root',
	  'password' => '',
	  'charset' => 'utf8',
	  ),
	 */
	'errorHandler' => array(
	    // use 'site/error' action to display errors
	    'errorAction' => 'site/error',
	),
	'log' => array(
	    'class' => 'CLogRouter',
	    'routes' => array(
		array(
		    'class' => 'CFileLogRoute',
		    'levels' => 'error, warning',
		),
	    // uncomment the following to show log messages on web pages
	    /*
	      array(
	      'class'=>'CWebLogRoute',
	      ),
	     */
	    ),
	),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
	// this is used in contact page
	'adminEmail' => 'webmaster@example.com',
    ),
);