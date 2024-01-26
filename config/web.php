<?php

// $params = require __DIR__ . '/params.php';
$params = array_merge(
    require __DIR__ . '/params.php',
    file_exists(__DIR__ . '/params-local.php') ? require __DIR__ . '/params-local.php' : []
);

$db = array_merge(
    require __DIR__ . '/db.php',
    file_exists(__DIR__ . '/db-local.php') ? require __DIR__ . '/db-local.php' : []
);

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@server' => 'http://ficphil.test/',
        '@productUrl' => '../img/default.png'
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'uxRCQHugxylIWUCzBi8EuehRU0sMrniv',
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
        // 'mailer' => [
        //     'class' => 'yii\swiftmailer\Mailer',
        //     'transport' => [
        //         'class' => 'Swift_SmtpTransport',
        //         'host' => 'localhost',
        //         // 'host' => 'smtpout.asia.secureserver.net',
        //         // 'username' => 'customer@itdi.com.ph',
        //         // 'password' => 'mithi@2020',
        //         'port' => '80',
        //         'encryption' => '',
        //     ],
        //     'useFileTransport' => false,
        // ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => ['itdi_dev@ficphil.com' => 'DOST-FIC']
            ],
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                // 'host' => 'localhost',
                'host' => 'smtpout.asia.secureserver.net',
                'username' => 'itdi_dev@ficphil.com',
                'password' => 'fic@12345',
                'port' => '80',
                'encryption' => '',
            ],
            'useFileTransport' => false,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // Add your other URL rules here...
                'site/index',
                'site/inquire/<tn:[\w\'-]+>' => 'site/inquire/', // Custom rule for site/index
            ],
        ],

        // 'as access' => [
        //     'class' => 'mdm\admin\components\AccessControl',
        //     'allowActions' => [
        //         // '*',
        //         'site/index',

        //         // The actions listed here will be allowed to everyone including guests.
        //         // So, 'admin/*' should not appear here in the production, of course.
        //         // But in the earlier stages of your development, you may probably want to
        //         // add a lot of actions here until you finally completed setting up rbac,
        //         // otherwise you may not even take a first step.
        //     ]
        // ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
