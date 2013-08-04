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
$frontendConfigDir = dirname(__FILE__);
//dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'
$root = $frontendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($frontendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
//Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend');
//Yii::setPathOfAlias('www', $root. DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'www');
Yii::setPathOfAlias('widgets', $root . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'widgets');
Yii::setPathOfAlias('bootstrap', $root . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'extensions'. DIRECTORY_SEPARATOR . 'bootstrap');
Yii::setPathOfAlias('comext', $root . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'extensions');

$mainLocalFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile) ? require($mainLocalFile) : array();

$mainEnvFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'main-env.php';
$mainEnvConfiguration = file_exists($mainEnvFile) ? require($mainEnvFile) : array();

return CMap::mergeArray(
		array(
	    // @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
	    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	    'name' => 'Yincart演示网',
	    'theme' => 'square',
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
		'comments' => array(
		    //you may override default config for all connecting models
		    'defaultModelConfig' => array(
			//only registered users can post comments
			'registeredOnly' => false,
			'useCaptcha' => false,
			//allow comment tree
			'allowSubcommenting' => true,
			//display comments after moderation
			'premoderate' => false,
			//action for postig comment
			'postCommentAction' => 'comments/comment/postComment',
			//super user condition(display comment list in admin view and automoderate comments)
			'isSuperuser' => 'Yii::app()->user->checkAccess("moderate")',
			//order direction for comments
			'orderComments' => 'DESC',
		    ),
		    //the models for commenting
		    'commentableModels' => array(
			//model with individual settings
			'Article' => array(
			    'registeredOnly' => false,
			    'useCaptcha' => true,
			    'allowSubcommenting' => false,
			    //config for create link to view model page(page with comments)
			    'pageUrl' => array(
				'route' => 'article/view',
				'data' => array('id' => 'article_id'),
			    ),
			),
			//model with default settings
			'ImpressionSet',
		    ),
		    //config for user models, which is used in application
		    'userConfig' => array(
			'class' => 'User',
			'nameProperty' => 'username',
			'emailProperty' => 'email',
		    ),
		),
		// uncomment the following to enable the Gii tool
		'member',
		'translate' => array(
		    'class' => 'application.modules.translate.TranslateModule'
		),
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
		'bootstrap' => array(
		    'class' => 'bootstrap.components.TbApi',
		),
		'cart' => array(
		    'class' => 'common.extensions.Cart',
		),
		'user' => array(
		    // enable cookie-based authentication
		    'allowAutoLogin' => true,
		    'class' => 'WebUser',
		    'loginUrl' => array('/site/login'),
//                    'stateKeyPrefix' => 'front_',
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
		/* setup message translation method */
		'messages' => array(
		    'class' => 'CDbMessageSource',
		    'onMissingTranslation' => array('Ei18n', 'missingTranslation'),
		    'sourceMessageTable' => 'source_message',
		    'translatedMessageTable' => 'message'
		),
		/* setup global translate application component */
		'translate' => array(
		    'class' => 'translate.components.Ei18n',
		    'createTranslationTables' => true,
		    'connectionID' => 'db',
		    'languages' => array(
			'en' => 'English',
			'de' => 'German',
			'zh_cn' => 'Chinese',
			'en_us' => 'America',
			'ru' => 'Russian'
		    )
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