<?php

// put your code here
// Loading dependencies
require 'vendor/autoload.php';
\Slim\Slim::registerAutoloader();
//
$app = new \Slim\Slim(array('templates.path' => 'templates'));

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

// ROUTING ****************************************************

$app->get('/', 'getHome');
$app->get('/test', 'testIt');
$app->get('/users(/:id)', 'getUsers');
$app->get('/files(/browse(/:dirId))', 'browseDir');
$app->map('/upload', 'uploadFiles')->via('GET', 'POST');

//


$app->get('/settings', function () use ($app) {
    $app->render('settings.twig');
});

$app->map('/register', function() use ($app) {
    if ($app->request()->getMethod() === 'POST') {
        $app->redirect('/register');
    } else if ($app->request()->getMethod() === 'GET') {
        $app->render('register.twig', array(
            'action_name' => 'Register',
            'action_url' => API_URI . '/register'
        ));
    }
})->via('GET', 'POST');


//
$app->run();

//
function testIt() {
    echo 'test it!';
}

//
function getHome() {
    $app = \Slim\Slim::getInstance();
    $app->render('login.twig', array(
        "title"=>"Login"
    ));
}

function getUsers($id = NULL) {
    $app = \Slim\Slim::getInstance();
    if ($id != null) {
        echo json_decode($app->request()->get());
    } else {
        
    }
}

function uploadFiles() {
    $app = \Slim\Slim::getInstance();
//    switch ($app->request() == 'GET')
//    {
//    case 'GET':
    $app->render('upload.twig', array(
        "action_name" => "Upload",
        "api_uri" => API_URI.'/files/upload',
        "redirection" => "http://localhost:8080/cubbyhole/webclient/"
    ));
//        break;
//    case 'POST':
//        echo 'POST';
//        break;
//    case 'PUT':
//        echo 'PUT';
//        break;
//    }

   
}

function browseDir ($dirId = null)
{
    $app = \Slim\Slim::getInstance();
    
    switch ($app->request()->getMethod())
    {
        case 'POST':
            break;
        case 'GET':
            if ($dirId != null)
    {
        $app->render('browse.twig');
    }else {
        $app->render('browse.twig');
    }
            break;
    }
    
}