<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Yincart演示购物网',
    'language' => 'zh_cn',
    'theme' => 'classic',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.components.helpers.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'admin',
        'member',
        'user',
        'rights' => array(
        //     'install'=>true, 
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('/user/login'),
            'class' => 'RWebUser',
        ),
        'cart' => array(
            'class' => 'application.extensions.Cart',
        ),
        'mailer' => array(
            'class' => 'application.extensions.mailer.EMailer',
            'pathViews' => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts'
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager', // Provides support authorization item sorting.
            'connectionID' => 'db',
            'itemTable' => '{{authitem}}',
            'itemChildTable' => '{{authitemchild}}',
            'assignmentTable' => '{{authassignment}}',
            'rightsTable' => '{{rights}}',
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '.html',
            'rules' => array(
//                '<action:\w+>'=>'site/<action>',
                'page/<key:\w+>' => 'page/index',
                'catalog/<key:\w+>' => 'catalog/index',
                'list-<category_id:\d+>' => 'item/index',
                'item-list-<key:\w+>' => 'item/list',
                'item-<id:\d+>' => 'item/view',
//                'list-<category_id:.*>' => 'item/index', 都可以
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
          // uncomment the following to use a MySQL database
         */
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yincart',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => '',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters' => array('127.0.0.1', '192.168.0.101'),
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            
//              array(
//              'class'=>'CWebLogRoute',
//              ),
             
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