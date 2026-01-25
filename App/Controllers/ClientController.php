<?php
namespace App\Controllers;
use App\Models\Client;
class ClientController{
    private $twig;
    private Client $client;

    public function __construct(){
        $this->client = new Client();
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
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'client') {
            header('Location: /public/login');
            exit();
        }
        echo $this->twig->render('ClientViewPage.html.twig', ['client' => $_SESSION['user']]);
    }
    public function create(){
        $model = $this->client;
        $firstname = $_POST['firstname'] ?? '';
        $lastname  = $_POST['lastname'] ?? '';
        $email     = $_POST['email'] ?? '';
        $password  = $_POST['password'] ?? '';
        $password = password_hash($password,PASSWORD_DEFAULT);
        if ($model->save($firstname, $lastname, $email, $password)) {
            echo $this->twig->render('LoginViewPage.html.twig');
        }
    }
    public function update(){

    }
}