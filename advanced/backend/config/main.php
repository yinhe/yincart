<?php

/**
 * main.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 5:48 PM
 *
 * This file holds the configuration settings of your backend application.
 * */
$backendConfigDir = dirname(__FILE__);

$root = $backendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($backendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('backend', $root . DIRECTORY_SEPARATOR . 'backend');
Yii::setPathOfAlias('www', $root . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'www');
Yii::setPathOfAlias('comext', $root . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'extensions');
/* uncomment if you need to use frontend folders */
/* Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend'); */


$mainLocalFile = $backendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile) ? require($mainLocalFile) : array();

$mainEnvFile = $backendConfigDir . DIRECTORY_SEPARATOR . 'main-env.php';
$mainEnvConfiguration = file_exists($mainEnvFile) ? require($mainEnvFile) : array();

return CMap::mergeArray(
    array(
        'name' => '后台管理系统',
        // @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
        'basePath' => 'backend',
        'theme' => 'backend',
        // set parameters
        'params' => $params,
        // preload components required before running applications
        // @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
        'preload' => array('bootstrap', 'log'),
        // @see http://www.yiiframework.com/doc/api/1.1/CApplication#language-detail
        'language' => 'zh_cn',
        // using bootstrap theme ? not needed with extension
//		'theme' => 'bootstrap',
        // setup import paths aliases
        // @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
        'import' => array(
            'backend.components.UserIdentity',
            'common.components.*',
            'common.extensions.*',
            /* uncomment if required */
            /* 'common.extensions.behaviors.*', */
            /* 'common.extensions.validators.*', */
            'common.models.*',
            // uncomment if behaviors are required
            // you can also import a specific one
            /* 'common.extensions.behaviors.*', */
            // uncomment if validators on common folder are required
            /* 'common.extensions.validators.*', */
            'application.components.*',
            'application.controllers.*',
            'application.models.*',
            'common.modules.user.models.*',
            'common.helpers.*',
        ),
        /* uncomment and set if required */
        // @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
        'modules' => array(
            'gii' => array(
                'class' => 'system.gii.GiiModule',
                'password' => '123',
                'generatorPaths' => array(
                    'bootstrap.gii'
                )
            ),
            'auth',
            'groupon',
            'cms' => array(
                'class' => 'common.modules.cms.CmsModule'
            ),
            'user' => array(
                'class' => 'common.modules.user.UserModule',
                # encrypting method (php hash function)
                'hash' => 'md5',
                # send activation email
                'sendActivationMail' => true,
                # allow access for non-activated users
                'loginNotActiv' => false,
                # activate user on registration (only sendActivationMail = false)
                'activeAfterRegister' => false,
                # automatically login from registration
                'autoLogin' => true,
                # registration path
                'registrationUrl' => array('/user/registration'),
                # recovery password path
                'recoveryUrl' => array('/user/recovery'),
                # login form path
                'loginUrl' => array('/user/login'),
                # page after login
                'returnUrl' => array('/user/profile'),
                # page after logout
                'returnLogoutUrl' => array('/user/login'),
            ),
            'mall' => array(
                'class' => 'common.modules.mall.MallModule'
            ),
        ),
        'components' => array(
            'request' => array(
                'enableCsrfValidation' => true,
                'enableCookieValidation' => true,
            ),
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
            /* load bootstrap components */
            'bootstrap' => array(
                'class' => 'common.extensions.bootstrap.components.Bootstrap',
                'responsiveCss' => true,
                'fontAwesomeCss' => true
            ),
            'errorHandler' => array(
                // @see http://www.yiiframework.com/doc/api/1.1/CErrorHandler#errorAction-detail
                'errorAction' => 'site/error'
            ),
            'cache' => array(
                'class' => 'system.caching.CFileCache',
            ),
            'settings' => array(
                'class' => 'CmsSettings',
                'cacheComponentId' => 'cache',
                'cacheId' => 'global_website_settings',
                'cacheTime' => 0,
                'tableName' => 'settings',
                'dbComponentId' => 'db',
                'createTable' => true,
                'dbEngine' => 'InnoDB',
            ),
//			'db'=> array(
//				'connectionString' => $params['db.connectionString'],
//				'username' => $params['db.username'],
//				'password' => $params['db.password'],
//				'schemaCachingDuration' => YII_DEBUG ? 0 : 86400000, // 1000 days
//				'enableParamLogging' => YII_DEBUG,
//				'charset' => 'utf8'
//			),
            'urlManager' => array(
                'urlFormat' => 'path',
                'showScriptName' => false,
                'urlSuffix' => '/',
                'rules' => $params['url.rules']
            ),
            /* make sure you have your cache set correctly before uncommenting */
            /* 'cache' => $params['cache.core'], */
            /* 'contentCache' => $params['cache.content'] */
        ),
    ), CMap::mergeArray($mainEnvConfiguration, $mainLocalConfiguration)
);
