
<?php

// put your code here
// Loading dependencies
require 'vendor/autoload.php';
\Slim\Slim::registerAutoloader();

use \User as User;

//
$app = new \Slim\Slim(array('templates.path' => 'templates'));
//
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = unserialize(CONFIG_APP);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());
//
// ROUTES
$app->get('/', 'getHome');
$app->get('/login', 'logIn');
$app->map('/register', 'registerUser')->via('GET', 'POST');
$app->map('/files/upload', 'uploadFiles')->via('GET', 'POST');
//$app->get('/files/browse(/:dirId)', 'browseDir');
$app->get('/users(/:id)', 'getUsers');
//$app->get('/users/edit/plan/:planId', 'editPlan');
$app->delete('/users/del/:id', 'deleteUser');
//
$app->run();

// ROUTING ****************************************************

function getHome() {
    echo '<h1>HOME PAGE</h1>';
}

function logIn() {
    echo '<h1>HOME PAGE</h1>';
}

function getUsers($id = null) {
    $app = \Slim\Slim::getInstance();
    $userDao = new \UserController();
    $response = array();

    if ($id == null) {
        $reponse["status"] = "Success";
        $reponse["content"] = $userDao->getAll()->toArray();
        sendResponse(200, $reponse);
    } else {
        sendResponse(200, $userDao->get($id)->toArray());
    }
}

function registerUser() {

    $req = \Slim\Slim::getInstance()->request();

    switch ($req->getMethod()) {
        case "POST":
            $userDao = new \UserController();
            echo "<h1>SIGN UP</h1>";
//
            $user = new User(array(
                'fullname' => $req->post('fullname'),
                'username' => $req->post('username'),
                'email' => $req->post('email'),
                'encrypted_password' => \PassHash::hash($req->post('password')),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ));
            if ($userDao->create($user) == USER_CREATED_SUCCESSFULLY) {
                $response = array(
                    "error" => false,
                    "message" => 'good'
                );
                sendResponse(201, $response);
            }

            break;

        case 'GET':
            \Slim\Slim::getInstance()->redirect($_SERVER['REQUEST_URI']);
            echo '<h1>SIGN FAIl</h1>';
            break;
    }
}

function deleteUser($id) {
    $userDao = new \UserController();
    if ($id == null) {
        
    } else {
        $userDao->delete($id);
    }
}

function sendResponse($status, $response = null) {
    $app = \Slim\Slim::getInstance();
    $app->status($status);
    $app->contentType('application/json');
    echo json_encode($response);
}

function uploadFiles() {
    $uploader = new FileHelper();
    $upload_dir = ROOT_FOLDER;
    $app = \Slim\Slim::getInstance();
    
    if ($app->request()->getMethod() == 'POST') {        
        $uploader->upload($app,$upload_dir);   
    } else {
        echo ROOT_FOLDER;
    }
}

// Helper functions

function exit_status($str) {
    echo json_encode(array('status' => $str));
    exit;
}

function get_extension($file_name) {
    $ext = explode('.', $file_name);
    $ext = array_pop($ext);
    return strtolower($ext);
}
