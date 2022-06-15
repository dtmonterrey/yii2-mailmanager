Overview
========

Module for managing sending emails and registering them.

Installation
------------

Just run migrations like

```bash
$ ./yii migrate --migrationPath=vendor/dtmonterrey/mailmanager/migrations
```

Or configure multiple paths on the migration controller from the console application
```
'controllerMap' => [
    'migrate' => [
        'class' => 'yii\console\controllers\MigrateController',
        'migrationPath' => [
            '@app/migrations',
              '@vendor/dtmonterrey/mailmanager/migrations',
        ],
    ],
],
```

Usage
-----

Use the following mailer in your app.

```php
'mailer' => [
    'class' => 'dtmonterrey\mailmanager\Mailer',
],
```

It inherits from yii\swiftmailer\Mailer so you can use the following config

```php
'mailer' => [
    'class' => 'dtmonterrey\mailmanager\Mailer',
    // send all mails to a file by default. You have to set
    // 'useFileTransport' to false and configure a transport
    // for the mailer to send real emails.
    'useFileTransport' => false,
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'smtp.server',
        'username' => 'user@server',
        'password' => 'password',
        'port' => '465',
        'encryption' => 'ssl',
        'plugins'=> [
            [
                'class' => 'Swift_Plugins_AntiFloodPlugin',
                'constructArgs' => [50,30],
            ],
        ],
    ],
],
```
