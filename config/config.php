<?php

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv(false);
$dotenv->loadEnv(dirname(__DIR__) . '/.env');

return [

    # cockpit session name
    'app.name' => $_ENV['APP_NAME'],

    # cockpit session name
    'session.name' => $_ENV['SESSION_NAME'],

    # app custom security key
    'sec-key' => $_ENV['SEC_KEY'],

    # site url (optional) - helpful if you're behind a reverse proxy
    'site_url' => $_ENV['SITE_URL'],

    # define the languages you want to manage
    'languages' => [
        'default' => 'English',       #setting a default language is optional
        // 'fr' => 'French',
        // 'de' => 'German'
    ],

    # define additional groups
    'groups' => [
        'author' => [
            '$admin' => false,
            '$vars' => [
                'finder.path' => '/storage/upload'
            ],
            'cockpit' => [
                'backend' => true,
                'finder' => true
            ],
            'collections' => [
                'manage' => true
            ]
        ]
    ],

    # use mongodb as main data storage
    // 'database' => [   
    //     'server' => 'mongodb://localhost:27017',
    //     'options' => [
    //         'db' => 'cockpitdb'
    //     ]
    // ],

    // Use SQL Driver as main data storage
     'database' => [
         'server' => 'sqldriver',
         // Connection options
         'options' => [
             'connection' => $_ENV['DB_CONNECTION'],         # One of 'mysql'|'pgsql'
             'host'       => $_ENV['DB_HOST'],     # Optional, defaults to 'localhost'
             'port'       => $_ENV['DB_PORT'],            # Optional, defaults to 3306 (MySQL) or 5432 (PostgreSQL)
             'dbname'     => $_ENV['DB_NAME'],
             'username'   => $_ENV['DB_USERNAME'],
             'password'   => $_ENV['DB_PASSWORD'],  # [Py?UL~CccO%
             'charset'    => 'UTF8',          # Optional, defaults to 'UTF8'
             'tablePrefix' => '',             # Optional, database tables prefix (ie. 'cockpit_')
             'bootstrapPriority' => 999,      # Optional, defaults to 999
         ],
         # Connection specific options
         # General: https://www.php.net/manual/en/pdo.setattribute.php
         # MySQL specific: https://www.php.net/manual/en/ref.pdo-mysql.php#pdo-mysql.constants
         'driverOptions' => [],
    ],

    # use smtp to send emails
    'mailer' => [
        'from'       => $_ENV['MAIL_FROM'],
        'transport'  => $_ENV['MAIL_TRANSPORT'],
        'host'       => $_ENV['MAIL_HOST'],
        'user'       => $_ENV['MAIL_USER'],
        'password'   => $_ENV['MAIL_PASSWORD'],
        'port'       => $_ENV['MAIL_PORT'],
        'auth'       => $_ENV['MAIL_AUTH'],
        'encryption' => $_ENV['MAIL_ENCRYPTION'] # '', 'ssl' or 'tls'
    ],

    # Define Access-Control (CORS) settings.
    # Those are the default values. You don't need to duplicate them all.
    'cors' => [
        'allowedHeaders' => 'X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding, Cockpit-Token',
        'allowedMethods' => 'PUT, POST, GET, OPTIONS, DELETE',
        'allowedOrigins' => '*',
        'maxAge' => '1000',
        'allowCredentials' => 'true',
        'exposedHeaders' => 'true',
    ],
];
