<?php

$config = [
    'sourceLanguage'=>'en_US',
    'language'=>'ru',
    'charset'=>'utf-8',

    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'jmcSJrG7BjVmGs1Tsna-XIWy1ey8at0z',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=nas_broker',
            'username' => 'nas-broker.com',
            'password' => '123456',
            'charset' => 'utf8',
        ],
        /*'urlManager'=>[
            'class'=>'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '\w+' => 'site/index',
                '<action:\w+>/<id:\w+>'  => 'site/<action>',

            ]
        ],*/
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',

                    'fileMap' => [
                        'app' => 'app.php',
                    ]
                ],
            ],
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
