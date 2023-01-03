<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            $this->userRepository->removeUserCookies();
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            $this->userRepository->removeUserCookies();
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            $this->userRepository->removeUserCookies();
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $cookie_name = "userID";
        $cookie_value = $this->userRepository->getUserID($email);
        setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/");

        if($this->userRepository->getAdmin($email)){
            $cookie_name = "admin";
            setcookie($cookie_name, true, time() + (28800), "/");
        }

        if(!isset($_COOKIE['userID'])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/");
        }

    }

    public function registration()
    {
        if (!$this->isPost()) {
            return $this->render('registration');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];


        if ($password !== $confirmedPassword) {
            return $this->render('registration', ['messages' => ['Please provide proper password']]);
        }

        //TODO try to use better hash function
        $user = new User($email, md5($password), $name, $surname, $phone, 0);
        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

    public function logout()
    {
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() - 42000);
                setcookie($name, '', time() - 42000, '/');
            }
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function profile_notice()
    {
        $id = $_COOKIE["userID"];
        $notices = $this->userRepository->getNotices($id);
        $this->render('profile_notice', ['notices' => $notices]);
    }

    public function getAll() {
        $userRepository = new UserRepository();
        return $userRepository->getAll();
    }

}