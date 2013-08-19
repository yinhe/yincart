<?php

require_once 'alias.php';

return array(
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
    ),
);