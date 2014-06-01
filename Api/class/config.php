<?php
use Illuminate\Database\Capsule\Manager as Capsule;
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


// Eloquent ORM **********************************************
$eloquent_settings = array(
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'cubbyhole',
    'username' => 'root',
    'password' => 'Supinf01',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix' => ''
);
//
define("CONFIG_APP", serialize($app_config));
define("CONFIG_ORM", serialize($eloquent_settings));
define('USER_CREATED_SUCCESSFULLY', 0);
define('USER_CREATE_FAILED', 1);
define('USER_ALREADY_EXISTED', 2);
//
define('API_URI', "http://localhost/cubbyhole/API");
define('ROOT_FOLDER', dirname(__DIR__)."\uploads");

$capsule = new Capsule();
$capsule->addConnection(unserialize(CONFIG_ORM));
$capsule->bootEloquent();
$capsule->setAsGlobal();

//      Connect using the Laravel Database component
$conn = $capsule->connection();
