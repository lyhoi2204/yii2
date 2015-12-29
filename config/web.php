<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '123456',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                'admin/index' => 'admin',
                'admin' => 'admin',
                //'categories'=>'app/categories',
                'view/<slug:[A-Za-z0-9 -_.]+>-<id:[0-9]+>'=>'site/detail',
                '<slug>/<type:[A-Za-z0-9 -_.]+>-<id:[0-9]+>'=>'site/type',
                '<slug:[A-Za-z0-9 -_.]+>-<id:[0-9]+>'=>'site/category',
                'search' => 'site/search',
                
                //'download/<type>/<slug:[A-Za-z0-9 -_.]+>-<id:[0-9]+>'=>'app/download',
                //'<type>/<slug:[A-Za-z0-9 -_.]+>-<id:[0-9]+>' => 'app/view',
            ],
        ],


        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';

    $config['modules']['admin'] = [
        'class' => 'app\modules\admin\Admin',
    ];

   

    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
