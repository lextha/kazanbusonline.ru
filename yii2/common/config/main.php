<?php

return [
    'name' => 'kazanbusonline.ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    //'bootstrap' => ['debug'],
    'modules' => [
        /* 'debug'=>[
          'class'=>'yii\debug\Module',
          'allowedIPs' => ['127.0.0.1'],
          ] */
       /* 'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['5.187.69.200']
        ],*/ 
        'sitemap' => [
            'class' => 'himiklab\sitemap\Sitemap',
            'models' => [
                // your models
                'common\models\News',
                'common\models\Route',
            //'common\models\Station',
            ],
            'enableGzip' => false, // default is false
            'cacheExpire' => 1, // 1 second. Default is 24 hours
        ],
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@frontend/runtime/cache'
        ],
        'user' => array(
            'loginUrl' => array('site/login'),
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ),
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=gb071124',  //gb231123
            'username' => 'gb',
            'password' => 'fO6kM3nK3f',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            'htmlLayout' => 'layouts/main-html',
            'textLayout' => 'layouts/main-text',
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => ['admin@kazanbusonline.ru' => 'kazanbusonline.ru'],
            ],
            'useFileTransport' => false,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'frontend\components\SlugUrlRule'],
                [
                    'pattern' => 'sitemap',
                    'route' => 'sitemap/default/index',
                    'suffix' => '.xml'
                ],
                '' => 'site/index',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    /* 'mailer' => [
      'class' => 'yii\swiftmailer\Mailer',
      'useFileTransport' => true,
      'transport' => [
      'class' => 'Swift_SmtpTransport',
      'host' => 'smtp.yandex.ru', // e.g. smtp.mandrillapp.com or smtp.gmail.com
      'username' => 'admin@goonbus.ru',
      'password' => 'kwnzetmprwmwffyw',
      'port' => 465, // Port 25 is a very common port too
      'encryption' => 'ssl', // It is often used, check your provider or mail server specs
      ],
      ], */
//kwnzetmprwmwffyw
    ],
        /* 'log' => [
          'traceLevel' => YII_DEBUG ? 4 :0,
          'target' => [
          [
          'class' => 'yii\log\FileTarget',
          'levels' => ['error','warning'],
          ]
          ]
          ] */
];
