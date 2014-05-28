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
        $app = new \Slim\Slim(array('templates.path' => 'templates'));
        //
        $app->view(new \Slim\Views\Twig());
        $app->view->parserOptions = unserialize(CONFIG_APP);
        $app->view->parserExtensions = array(new \Slim\Views\TwigExtension());
        //
        
        // ROUTING ****************************************************

        $app->get('/', function () use ($app) {
            echo 'ok';
            //$app->render('login.twig');
        });
        
        $app->get('/signup/plan/:id', function () use ($app) {
            echo "<h1>REGISTERING USER</h1><br/><h>{}</h2>";            
            //$app->render('login.twig');
        });

        $app->run();
        ?>
    </body>
</html>
