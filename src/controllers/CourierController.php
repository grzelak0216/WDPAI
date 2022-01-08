<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Courier.php';
require_once __DIR__.'/../repository/CourierRepository.php';

class CourierController extends AppController {

    private $message = [];
    private $courierRepository;

    public function __construct()
    {
        parent::__construct();
        $this->courierRepository = new CourierRepository();
    }

    public function courierNotice()
    {
        $projects = $this->courierRepository->getProjects();
        $this->render('courier_notice', ['projects' => $projects]);
    }

    public function addCourierNotice()
    {
        if ($this->isPost() && $this->correct()) {


            // TODO create new project object and save it in database
            $courier = new Courier(
                $_POST['startCity'],
                $_POST['startStreet'],
                $_POST['endCity'],
                $_POST['endStreet'],
                $_POST['extraRoad'],
                $_POST['maxSize'],
                $_POST['description'],
                $_POST['deadline'],
                $_POST['brand'],
                $_POST['model'],
                $_POST['year'],
                $_POST['registration']
            );

            $this->courierRepository->addCourierNotice($courier);

            return $this->render('courier_notice', ['messages' => $this->message]);
        }
        return $this->render('add_courier_notice', ['messages' => $this->message]);
    }

    private function correct(): bool
    {
        if (false) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}