<?php

//Error reporting
error_reporting(0);
ini_set('display_error', '0');

//Timezone
date_default_timezone_set('Europe/Berlin');

// settings
$settings = [];

// Path settings
$settings['root'] = dirname(__DIR__);
$settings['temp'] = $settings['root'] . '/tmp';
$settings['public'] = $settings['root'] . '/public';

// Error Handling Middleware settings
$settings['error'] = [

    // Should be set to false in prod
    'display_errors_details' => true,

    // Parameter is passed to the default ErrorHandler
    // View in rendered output by enabling the "displayErrorDetails" settings.
    //For the console and the unit tests we also disable it
    'log_errors' => true,

    // Display error details in error log
    'log_error_details' => true,
];

return $settings;