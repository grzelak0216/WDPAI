<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';

class SecurityController extends AppController {

    public function login()
    {   
        $user = new User('jsnow@pk.edu.pl', 'admin', 'Johnny', 'Snow');

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }

    public function registration()
    {
        $user = new User('jsnow@pk.edu.pl', 'admin', 'Johnny', 'Snow');

        if (!$this->isPost()) {
            return $this->render('registration');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePassword = $_POST['rePassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        if(empty($email) or empty($password) or empty($rePassword) or empty($name) or empty($surname)){
            return $this->render('registration', ['messages' => ['All fields must be filled in']]);
        }

        if ($user->getEmail() == $email) {
            return $this->render('registration', ['messages' => ['User with this email exist!']]);
        }

        if ($rePassword !== $password) {
            return $this->render('registration', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }


    public function quotation()
    {
        if (!$this->isPost()) {
            return $this->render('quotation');
        }

        $width = $_POST['width'];
        $height = $_POST['height'];
        $depth = $_POST['depth'];
        $route = $_POST['route'];
        $price = 0;

        if(empty($width) or $width <= 0){
            return $this->render('quotation', ['messages' => ['Wrong value of width']]);
        }

        if(empty($height) or $height <= 0){
            return $this->render('quotation', ['messages' => ['Wrong value of height']]);
        }

        if(empty($depth) or $depth <= 0){
            return $this->render('quotation', ['messages' => ['Wrong value of depth']]);
        }

        if(empty($route) or $route <= 0){
            return $this->render('quotation', ['messages' => ['Wrong value of route']]);
        }

        $price = ($width * $height * $depth) / 1000 * ($route / 100);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }
}