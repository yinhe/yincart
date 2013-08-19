<?php

require_once 'alias.php';

return array(
    'preload' => array(
        'translate'
    ),
    'import' => array(
        'common.components.*',
        'common.extensions.*',
        'common.models.*',
    ),
//    'modules' => array(
//        'comments' => array(
//            'class' => 'common.modules.comments.CommentsModule',
//            //you may override default config for all connecting models
//            'defaultModelConfig' => array(
//                //only registered users can post comments
//                'registeredOnly' => false,
//                'useCaptcha' => false,
//                //allow comment tree
//                'allowSubcommenting' => true,
//                //display comments after moderation
//                'premoderate' => false,
//                //action for postig comment
//                'postCommentAction' => 'comments/comment/postComment',
//                //super user condition(display comment list in admin view and automoderate comments)
//                'isSuperuser' => 'Yii::app()->user->checkAccess("moderate")',
//                //order direction for comments
//                'orderComments' => 'DESC',
//            ),
//            //the models for commenting
//            'commentableModels' => array(
//                //model with individual settings
//                'Citys' => array(
//                    'registeredOnly' => true,
//                    'useCaptcha' => true,
//                    'allowSubcommenting' => false,
//                    //config for create link to view model page(page with comments)
//                    'pageUrl' => array(
//                        'route' => 'admin/citys/view',
//                        'data' => array('id' => 'city_id'),
//                    ),
//                ),
//                //model with default settings
//                'ImpressionSet',
//            ),
//            //config for user models, which is used in application
//            'userConfig' => array(
//                'class' => 'User',
//                'nameProperty' => 'username',
//                'emailProperty' => 'email',
//            ),
//        ),
//    ),
    'components' => array(
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