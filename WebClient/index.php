<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        // put your code here
        // Loading dependencies
        require 'vendor/autoload.php';
        //
        $app = new \Slim\Slim(array(
            'templates.path' => 'templates',
        ));
        
        // Prepare view *********************************************
        $app->view(new \Slim\Views\Twig());
        $app->view->parserOptions = array(
            'charset' => 'utf-8',
            'cache' => realpath('/templates/cache'),
            'auto_reload' => true,
            'strict_variables' => false,
            'autoescape' => true
        );
        $app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

        // Eloquent ORM **********************************************
        $capsule = new Illuminate\Database\Capsule\Manager;
        $settings = array(
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'slim_test_db',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix' => ''
        );

        $capsule->addConnection($settings);
        $capsule->bootEloquent();
        $capsule->setAsGlobal();

//      Connect using the Laravel Database component
        $conn = $capsule->connection();

        // ROUTING ****************************************************

        $app->get('/', function () use ($app) {
            $app->render('login.twig');
        });
        
        $app->get('/browse', function () use ($app) {           
            $app->render('browse.twig');
             
        });
        
        $app->get('/settings', function () use ($app) {           
            $app->render('settings.twig');
             
        });

        $app->run();
        ?>
    </body>
</html>
