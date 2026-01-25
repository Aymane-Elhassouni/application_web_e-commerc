<?php
namespace App\Controllers;
use App\Models\Admin;
class AdminController{
    private $twig;
    private Admin $admin;

    public function __construct(){
        $this->admin = new Admin();
    }
    public function getTwig(){
        return $this->twig;
    }

    public function setTwig($twig){
        $this->twig = $twig;
    }

    public function index(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /public/login');
            exit();
        }
        echo $this->twig->render('AdminViewPage.html.twig', ['admin' => $_SESSION['user']]);
    }
    public function create(){
        $admin = new Admin();
        $firstname = $_POST['firstname'] ?? '';
        $lastname  = $_POST['lastname'] ?? '';
        $email     = $_POST['email'] ?? '';
        $password  = $_POST['password'] ?? '';
        $password = password_hash($password,PASSWORD_DEFAULT);
        if ($admin->save($firstname, $lastname, $email, $password)) {
            echo $this->twig->render('LoginViewPage.html.twig');
        }
        return 0;
    }
    public function update(){

    }
}