<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "Controllers/AuthController.php";
require_once "Controllers/HomeControl.php";

$action = $_GET['action'] ?? 'login';
$auth = new AuthController();

switch ($action) {
    case 'home':
        $home = new HomeControl();
        $home->index();
        break;
    case 'login':
        $auth->loginView();
        break;
    case 'signup':
        $auth->signupView();
        break;
    case 'process_login':
        $auth->processLogin();
        break;
    case 'process_signup':
        $auth->processRegister();
        break;
    case 'logout':
        $auth->logout();
        break;
    default:
        $auth->loginView();
        break;
}

?>