<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('start');
    }

    public function login()
    {
        $this->render('login');
    }

    public function registration()
    {
        $this->render('registration');
    }

    public function profile_notice()
    {
        $this->render('profile_notice');
    }

    public function quotation() //do dokończenia 
    {
        $this->render('quotation');
    }

    public function courier_notice() //do dokończenia 
    {
        $this->render('courier_notice');
    }
    
}