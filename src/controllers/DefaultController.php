<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('start');
    }

    public function profile_notice()
    {
        $this->render('profile_notice');
    }

    public function quotation()
    {
        $this->render('quotation');
    }

    public function chat()
    {
        $this->render('chat');
    }

    public function recipients()
    {
        $this->render('recipients');
    }

}