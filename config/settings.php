<?php
//TODO: il faut que je traduise tout ça :)
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');

//Timezone
date_default_timezone_set('Europe/Berlin');

// settings
$settings = [];

// Path settings
$settings['root'] = dirname(__DIR__);
$settings['temp'] = $settings['root'] . '/tmp';
$settings['public'] = $settings['root'] . '/public';

//Database settings
$settings['db'] = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'username' => 'root',
    'database' => 'tutoslim',
    'password' => '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'flags' => [
            //turn off persistent connections
        PDO::ATTR_PERSISTENT => false,
        //enable exceptions
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        //Emulate prepared statements
        PDO::ATTR_EMULATE_PREPARES => true,
        // Set default fetch mode to array
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // set character set
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
    ],
];


// Error Handling Middleware settings
$settings['error'] = [

    // Should be set to false in prod
    'display_error_details' => true,

    // Parameter is passed to the default ErrorHandler
    // View in rendered output by enabling the "displayErrorDetails" settings.
    //For the console and the unit tests we also disable it
    'log_errors' => true,

    // Display error details in error log
    'log_error_details' => true,

];

return $settings;