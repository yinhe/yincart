<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('widgets', dirname(__FILE__) . '/../widgets');

return CMap::mergeArray(require(dirname(__FILE__) . '/../../common/config/main.php'), array(
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
            'name' => 'Yincart演示购物网',
            'language' => 'en',
            'theme' => 'ultimo',
            // preloading 'log' component
            'preload' => array('log'),
            // autoloading model and component classes
            'import' => array(
                'application.models.*',
                'application.components.*',
                'application.components.helpers.*',
                'common.modules.cms.models.*',
                'common.modules.mall.models.*',
                'common.modules.user.models.*',
                'common.modules.user.components.*',
                'application.modules.yiiseo.models.*',
            ),
            'modules' => array(
                'yiiseo' => array(
                    'class' => 'application.modules.yiiseo.YiiseoModule',
                    'password' => '123', // your default password is 123
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
                        'Citys' => array(
                            'registeredOnly' => true,
                            'useCaptcha' => true,
                            'allowSubcommenting' => false,
                            //config for create link to view model page(page with comments)
                            'pageUrl' => array(
                                'route' => 'admin/citys/view',
                                'data' => array('id' => 'city_id'),
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
                'gii' => array(
                    'class' => 'system.gii.GiiModule',
                    'password' => '123',
                    // If removed, Gii defaults to localhost only. Edit carefully to taste.
                    'ipFilters' => array('127.0.0.1', '::1'),
                    'generatorPaths' => array(
                        'bootstrap.gii'
                    ),
                ),
            ),
            // application components
            'components' => array(
                'seo' => array(
                        'class' => 'application.modules.yiiseo.components.SeoExt',
                    ),
                'user' => array(
                    // enable cookie-based authentication
                    'allowAutoLogin' => true,
                    'class' => 'WebUser',
                    'loginUrl' => array('/user/login'),
                    'stateKeyPrefix' => 'front_',
                ),
                'bootstrap' => array(
                    'class' => 'bootstrap.components.Bootstrap'
                ),
                'errorHandler' => array(
                    // use 'site/error' action to display errors
                    'errorAction' => 'site/error',
                ),
                'urlManager' => array(
                    'rules' => array(
                        'page/<key:\w+>' => 'page/index',
                        'catalog/<key:\w+>' => 'catalog/index',
                        'list/<category_id:\d+>' => 'item/index',
                        'item-list-<key:\w+>' => 'item/list',
//                        'item-<id:\d+>' => 'item/view',
                        'item/<id:\d+>/<title:.*?>' => 'item/view',
                        'article/<id:\d+>/<title:.*?>' => 'article/view',
                        '<_c:\w+>/<id:\d+>' => '<_c>/view',
                        '<_c:\w+>/<_a:\w+>/<id:\d+>' => '<_c>/<_a>',
                        '<_c:\w+>/<_a:\w+>' => '<_c>/<_a>',
                    ),
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
//        'log' => array(
//            'class' => 'CLogRouter',
//            'routes' => array(
//                array(
//                    'class' => 'CFileLogRoute',
//                    'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
////                    'ipFilters' => array('127.0.0.1', '192.168.0.101'),
//                    'levels' => 'error, warning',
//                ),
//            // uncomment the following to show log messages on web pages
//            /*
//              array(
//              'class'=>'CWebLogRoute',
//              ),
//             */
//            ),
//        ),
            ),
            // application-level parameters that can be accessed
            // using Yii::app()->params['paramName']
            'params' => array(
                // this is used in contact page
                'adminEmail' => 'webmaster@example.com',
            ),
        ));