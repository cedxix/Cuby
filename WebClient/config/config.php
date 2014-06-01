<?php
//
//
// Prepare view *********************************************
$app_config = array(
    'charset' => 'utf-8',
    'cache' => realpath('/templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);

//
define("CONFIG_APP", serialize($app_config));
//
define("USER_CREATED_SUCCESS", true);
define("USER_CREATED_FAILED", false);

define('API_URI', "http://localhost/cubbyhole/API");
define('API_BASE_URL', "http://localhost/cubbyhole/API");


