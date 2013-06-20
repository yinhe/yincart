<?php

require_once 'alias.php';

return array(
    'preload' => array(
        'translate'
    ),
    // path aliases
    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../../common/extensions/bootstrap'), // change this if necessary
    ),
    'import' => array(
        'common.components.*',
        'common.extensions.*',
        'common.models.*',
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array('bootstrap.gii'),
        ),
    ),
    'components' => array(
        'bootstrap' => array(
	    'class' => 'bootstrap.components.Bootstrap',
	    'responsiveCss' => true,
            'fontAwesomeCss' => true,
//            'enableCdn' => true,
	),
        'cart' => array(
            'class' => 'common.extensions.Cart',
        ),
        'mailer' => array(
            'class' => 'common.extensions.mailer.EMailer',
            'pathViews' => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts'
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                // 'list-<category_id:.*>' => 'item/index', 都可以
                '<_m:\w+>/<_c:\w+>/<id:\d+>' => '<_m>/<_c>/view',
                '<_m:\w+>/<_c:\w+>/<_a:\w+>-<id:\d+>' => '<_m>/<_c>/<_a>',
                '<_m:\w+>/<_c:\w+>/<_a:\w+>' => '<_m>/<_c>/<_a>',
            ),
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
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
//        'params' => array(
//                    // this is used in contact page
//                    'version' => '1.0.3'
//                ),
    ),
);