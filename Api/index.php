
<?php

// put your code here
// Loading dependencies
require 'vendor/autoload.php';
\Slim\Slim::registerAutoloader();

use \UserModel as User;
Use \FileController as FileDao;
use \FileModel as File;

//
$app = new \Slim\Slim(array('templates.path' => 'templates'));
//
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = unserialize(CONFIG_APP);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());
// 
// ROUTES
$app->get('/', 'getHome');
$app->map('/login', 'getLoginPage')->via('POST', 'GET');
$app->map('/register', 'registerUser')->via('GET', 'POST');
$app->map('/files/upload', 'uploadFiles')->via('GET', 'POST');
//$app->get('/files/browse(/:dirId)', 'browseDir');
$app->get('/users(/:id)', 'getUsers');
//$app->get('/users/edit/plan/:planId', 'editPlan');
$app->delete('/users/del/:id', 'deleteUser');
//
// SECURING ROUTES


$app->run();

// ROUTING ****************************************************

function getHome() {
    sendResponse(200, false, 'success', 'Home page | API is working great', null);                                    
}

function getLoginPage() {

    $app = \Slim\Slim::getInstance();   
    $req = $app->request();
    switch ($app->request()->getMethod()) {
        case 'GET':
            sendResponse(200, false, 'success', 'Welcome to authentication page', null);                                
            //
            break;
        case 'POST' :
            //            
//            echo ($req->post('username').'-----------'. $req->post('password')) ;            
            $check = doLogin($req->post('username'), $req->post('password'));            
            //   
            if ($check) {
                sendResponse(200, false, 'success', 'Authentication success', $user = \UserModel::where('username', '=', $req->post('username'))->first());                                
            } else {
                sendResponse(404, true, 'fail', 'Authentication failed, User/Password not found', null);                                
            }

            break;
    }
}

function getUsers($id = null) {

    $userDao = new \UserController();
    try {
        if ($id == null) {
            sendResponse(200, false, 'success', 'Users found', $userDao->getAll()->toArray());
        } else {            
            sendResponse(200, false, 'success', 'User found', $userDao->get($id)->toArray());
        }
    } catch (Exception $ex) {
        sendResponse(404, true, 'fail', 'Users not found', $ex);
    }
}

function registerUser() {

    $req = \Slim\Slim::getInstance()->request();

    switch ($req->getMethod()) {
        case "POST":
            $userDao = new \UserController();            
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
                sendResponse(201, false, 'success', 'User created successfully', null);
            }
            break;

        case 'GET':
            sendResponse(404, true, 'fail', 'You are not allow to view this page', null);
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


function uploadFiles() {
    $uploader = new FileHelper();
    $upload_dir = ROOT_FOLDER;
    $app = \Slim\Slim::getInstance();
    $fileDao = new FileDao();

    if ($app->request()->getMethod() == 'POST') {
//        if ($uploader->upload($app, $upload_dir)) {        
        $fileInfo_to_store = $uploader->upload($app, $upload_dir);
        echo json_encode($fileInfo_to_store);
        $fileDao->create($fileInfo_to_store);
//        }
    } else {
        echo ROOT_FOLDER;
    }
}

function sendResponse($code = 404, $error = true, $status ='fail', $message = null, $data = null) {
    $app = \Slim\Slim::getInstance();
    $app->status($code);
    $app->contentType('application/json');
    $response = array(
        "error" => $error,
        "status" => $status,
        "message" => $message,
        "data" => $data
    );
    echo json_encode($response);
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

function doLogin($username = null  , $password = null) {
    
    if($username == null || $password == null){return false;}
    //
    try {            
        $q = \UserModel::select('id','username','encrypted_password')->whereusername($username);   
        $user = $q->get()->toArray();
        $crypt_pass =  $user[0]['encrypted_password']     ;    
        
        if ($q != null) {
            $check = \PassHash::checkHash($crypt_pass, $password);
             //echo $q;
            if ($check) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        //
    } catch (Exception $ex) {
        throw $ex;
    }
}
