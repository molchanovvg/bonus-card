<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ofDj8HF_jOfutUOVcb1VzR4rqXmP4-ZY',
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

        'urlManager' => [
            'showScriptName' => false,     // Disable index.php
            'enablePrettyUrl' => true,     // Disable ?r= routes
            'enableStrictParsing' => true, // Only routes being listed in rules
            'rules' => [
                '/' => '/bonus-cards/index',
                '/index' => '/bonus-cards/index',
                '/bonus-cards/create' => '/bonus-cards/create',
                '/bonus-cards/view' => '/bonus-cards/view',
                '/bonus-cards/update' => '/bonus-cards/update',
                '/bonus-cards/delete' => '/bonus-cards/delete',
                '/bonus-cards/action/<id:\d+>' => '/bonus-cards/action',
                '/generate' => '/bonus-cards/generate',
                '/sales' => '/sales/index',
                '/sales/create' => '/sales/create',
                '/sales/view' => '/sales/view',
                '/sales/update' => '/sales/update',
                '/sales/delete' => '/sales/delete',
            ],
        ],

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
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
