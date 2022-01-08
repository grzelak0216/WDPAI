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

    public function info_transport_notice()
    {
        $this->render('info_transport_notice');
    }

    public function info_courier_notice()
    {
        $this->render('info_courier_notice');
    }

    public function transport_notice()
    {
        $this->render('transport_notice');
    }

    public function courier_notice()
    {
        $this->render('courier_notice');
    }
}