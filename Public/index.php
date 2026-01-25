<?php
require_once '../vendor/autoload.php';
use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\ClientController;

$loader = new \Twig\Loader\FilesystemLoader('../app/views');
$twig = new \Twig\Environment($loader);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$twig->addGlobal('session', $_SESSION);
/* include 'Database/Database.php';
include 'Models/Auteur.php';
include 'Controllers/AuteurController.php'; */

// echo '<pre>';
// $data = new Database();
// var_dump($data->connection());

// echo '</pre>';
/* echo 'INDEX LOADED';
die; */

switch($_SERVER["REQUEST_URI"]){
    case '/public/home' :
        echo 'this is home';
    break;
    case '/public/admin' :
        // require_once '../App/Controllers/AdminController.php';
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
            $admin = new AdminController();
            $admin->setTwig($twig);
            
            $admin->index($_SESSION['user']['email']); 
        } else {
            header('Location: /public/login');
            exit();
        }
    break;
    
    case '/public/client' :
        // require_once '../App/Controllers/ClientController.php';
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'client') {
            $client = new ClientController();
            $client->setTwig($twig);
        
            $client->index($_SESSION['user']['email']); 
        } else {
            header('Location: /public/login');
            exit();
        }
    break;
    case '/public/login':
        echo $twig->render('LoginViewPage.html.twig');
        
    break;
    case '/public/register':
        echo $twig->render('RegisterViewPage.html.twig');
        
    break;
    case '/public/register-submit':
        $register = new AuthController($twig);
        $register->register();
    break;
    case '/public/login-submit':
        $login = new AuthController($twig);
        $login->login();
    break;
    case '/public/logout':
        $login = new AuthController($twig);
        $login->logout();
    break;
}