<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');

return CMap::mergeArray(require(dirname(__FILE__) . '/../../common/config/main.php'), array(
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
            'name' => '后台管理系统',
            'language' => 'zh_cn',
            'theme' => 'bootstrap',
            // preloading 'log' component
            'preload' => array('log'),
            // autoloading model and component classes
            'import' => array(
                'common.components.*',
                'common.extensions.*',
                'common.extensions.ucenter.*',
                'common.models.*',
                'application.models.*',
                'application.components.*',
                'application.components.helpers.*',
            ),
            'modules' => array(
                // uncomment the following to enable the Gii tool
                'cms' => array(
                    'class' => 'common.modules.cms.CmsModule',
                ),
                'mall' => array(
                    'class' => 'common.modules.mall.MallModule',
                ),
                'auth',
                'user' => array(
                    'class' => 'common.modules.user.UserModule',
                ),
                'gii' => array(
                    'class' => 'system.gii.GiiModule',
                    'password' => '123',
                    // If removed, Gii defaults to localhost only. Edit carefully to taste.
                    'ipFilters' => array('127.0.0.1', '::1'),
                    'generatorPaths' => array(
                        'bootstrap.gii'
                    ),
                ),
                'backup',
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
                'authManager' => array(
                    'class' => 'CDbAuthManager', // Provides support authorization item sorting.
                    'connectionID' => 'db',
//            'itemTable' => '{{authitem}}',
//            'itemChildTable' => '{{authitemchild}}',
//            'assignmentTable' => '{{authassignment}}',
                    'behaviors' => array(
                        'auth' => array(
                            'class' => 'auth.components.AuthBehavior',
                            'admins' => array('admin'), // users with full access
                        ),
                    ),
                ),
                'bootstrap' => array(
                    'class' => 'comext.bootstrap.components.Bootstrap',
                    'responsiveCss' => true,
                ),
                // uncomment the following to enable URLs in path-format
                'urlManager' => array(
                    'rules' => array(
                        '<_c:\w+>/<id:\d+>' => '<_c>/view',
                        '<_c:\w+>/<_a:\w+>/<id:\d+>' => '<_c>/<_a>',
                        '<_c:\w+>/<_a:\w+>' => '<_c>/<_a>',
                    ),
                ),
                'errorHandler' => array(
                    // use 'site/error' action to display errors
                    'errorAction' => 'site/error',
                ),
//                'log' => array(
//                    'class' => 'CLogRouter',
//                    'routes' => array(
//                        array(
//                            'class' => 'CFileLogRoute',
//                            'class' => 'comext.yii-debug-toolbar.YiiDebugToolbarRoute',
////                    'ipFilters' => array('127.0.0.1', '192.168.0.101'),
//                            'levels' => 'error, warning',
//                        ),
//                    // uncomment the following to show log messages on web pages
//                    /*
//                      array(
//                      'class'=>'CWebLogRoute',
//                      ),
//                     */
//                    ),
//                ),
                // application-level parameters that can be accessed
                // using Yii::app()->params['paramName']
                'params' => array(
                    // this is used in contact page
//                    'version' => '1.0.3',
                    'adminEmail' => 'webmaster@example.com',
                    'backup' => array('path' => __DIR__ . '/../../common/_backup/'),
                ),
            ),
        ));
