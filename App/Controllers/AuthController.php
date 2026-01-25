<?php
namespace App\Controllers;

use App\Models\Admin;
use App\Models\Client;

class AuthController{
    private $twig;
    public function __construct($twig) {
        $this->twig = $twig;
    }
    public function register(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            echo $this->twig->render('LoginViewPage.html.twig');
            if($_POST['role'] == 'admin'){
                $admin = new AdminController();
                $admin->create();
            }else if($_POST['role'] == 'client'){
                $client = new ClientController();
                $client->create();
            }
        }else{
            echo $this->twig->render('RegisterViewPage.html.twig');
        }
    }
    private function handleSession($user) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user'] = [
            'id'        => $user->getId(),
            'firstname' => $user->getFirstname(),
            'lastname'  => $user->getLastname(),
            'email'     => $user->getEmail(),
            'role'      => $user->getRole()
        ];
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $adminModel = new Admin();
            $user = $adminModel->findByEmail($email);
            if (!$user || $user->getRole() !== 'admin') {
            $clientModel = new Client();
            $user = $clientModel->findByEmail($email);
        }if ($user && password_verify($password, $user->getPassword())) {
            $this->handleSession($user);
            
            $path = ($user->getRole() === 'admin') ? '/public/admin' : '/public/client';
            header("Location: $path");
            exit();
        } else {
            echo $this->twig->render('LoginViewPage.html.twig', ['error' => 'Infos incorrectes']);
        }
        }
    
    }

    public function logout(){
        session_start();

        unset($_SESSION['user']);

        session_destroy();
        header('Location: login');
    }
}