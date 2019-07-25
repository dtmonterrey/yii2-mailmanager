<?php


$config = [
    'id' => 'evandro-mailmanager',
    'basePath' => dirname(__DIR__),
    'version' => '0.3.0',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlite:runtime/database.db',
        ],
    ],
    'modules'=>[
       'user-management' => [
           'class' => 'webvimark\modules\UserManagement\UserManagementModule',
            'controllerNamespace'=>'vendor\webvimark\modules\UserManagement\controllers', // To prevent yii help from crashing
        ],
    ],
    'params' => [
        'adminEmail' => 'admin@example.com',
    ],
];



return $config;
