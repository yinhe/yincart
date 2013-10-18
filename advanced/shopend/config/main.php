<?php

/**
 * main.php
 *
 * This file holds frontend configuration settings.
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 5:48 PM
 */
$shopendConfigDir = dirname(__FILE__);
//dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'
$root = $shopendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($shopendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
//Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend');
//Yii::setPathOfAlias('www', $root. DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'www');
Yii::setPathOfAlias('widgets', $root . DIRECTORY_SEPARATOR . 'shopend' . DIRECTORY_SEPARATOR . 'widgets');
Yii::setPathOfAlias('bootstrap', $root . DIRECTORY_SEPARATOR . 'shopend' . DIRECTORY_SEPARATOR . 'extensions' . DIRECTORY_SEPARATOR . 'bootstrap');
Yii::setPathOfAlias('comext', $root . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'extensions');
Yii::setPathOfAlias('xupload', $root . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'extensions' . DIRECTORY_SEPARATOR . 'xupload');

$mainLocalFile = $shopendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile) ? require($mainLocalFile) : array();

$mainEnvFile = $shopendConfigDir . DIRECTORY_SEPARATOR . 'main-env.php';
$mainEnvConfiguration = file_exists($mainEnvFile) ? require($mainEnvFile) : array();

return CMap::mergeArray(
    array(
        // @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
        'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
        'name' => 'Yincart店铺街',
        'theme' => 'fashion',
        // set parameters
        'params' => $params,
        // preload components required before running applications
        // @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
        'preload' => array('log', 'translate'),
        // @see http://www.yiiframework.com/doc/api/1.1/CApplication#language-detail
        'language' => 'zh_cn',
        // uncomment if a theme is used
        /* 'theme' => '', */
        // setup import paths aliases
        // path aliases
        'aliases' => array(
            // yiistrap configuration
            'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change if necessary
            // yiiwheels configuration
            'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
        ),
        // @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
        'import' => array(
            'common.modules.user.components.*',
            'common.modules.user.models.*',
            'common.components.*',
            'common.extensions.*',
            'common.models.*',
            // uncomment if behaviors are required
            // you can also import a specific one
            /* 'common.extensions.behaviors.*', */
            // uncomment if validators on common folder are required
            /* 'common.extensions.validators.*', */
            'application.components.*',
            'application.components.helpers.*',
            'application.controllers.*',
            'application.models.*',
            'widgets.fashion.*',
            'bootstrap.helpers.TbHtml',
            'common.modules.cms.models.*',
            'common.modules.mall.models.*',
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
            'admin',
            // uncomment the following to enable the Gii tool
            'member',
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
            'request'=>array(
                'enableCsrfValidation'=>true,
                'enableCookieValidation'=>true,
            ),
            'oauth' => array(
                'class' => 'common.components.oauth'
            ),
            // yiistrap configuration
            'bootstrap' => array(
                'class' => 'bootstrap.components.TbApi',
            ),
            // yiiwheels configuration
            'yiiwheels' => array(
                'class' => 'yiiwheels.YiiWheels',
            ),
            'cart' => array(
                'class' => 'common.extensions.Cart',
            ),
            'user' => array(
                // enable cookie-based authentication
                'allowAutoLogin' => true,
                'class' => 'WebUser',
                'loginUrl' => array('/site/login'),
                'stateKeyPrefix' => 'front_',
            ),
            'cache' => array(
                'class' => 'system.caching.CFileCache',
            ),
            'settings' => array(
                'class' => 'CmsSettings',
                'cacheComponentId' => 'cache',
                'cacheId' => 'global_website_settings',
                'cacheTime' => 0,
                'tableName' => '{{settings}}',
                'dbComponentId' => 'db',
                'createTable' => true,
                'dbEngine' => 'InnoDB',
            ),
            'errorHandler' => array(
                // @see http://www.yiiframework.com/doc/api/1.1/CErrorHandler#errorAction-detail
                'errorAction' => 'site/error'
            ),
            'db' => array(
                'connectionString' => $params['db.connectionString'],
                'username' => $params['db.username'],
                'password' => $params['db.password'],
                'schemaCachingDuration' => YII_DEBUG ? 0 : 86400000, // 1000 days
                'enableParamLogging' => YII_DEBUG,
                'charset' => 'utf8',
                'tablePrefix' => ''
            ),
            'urlManager' => array(
                'urlFormat' => 'path',
                'showScriptName' => false,
                'urlSuffix' => '.html',
                'rules' => $params['url.rules']
            ),
            'mailer' => array(
                'class' => 'common.extensions.mailer.EMailer',
                'pathViews' => 'application.views.email',
                'pathLayouts' => 'application.views.email.layouts'
            ),
            /* make sure you have your cache set correctly before uncommenting */
            /* 'cache' => $params['cache.core'], */
            /* 'contentCache' => $params['cache.content'] */
        ),
    ), CMap::mergeArray($mainEnvConfiguration, $mainLocalConfiguration)
);