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

    public function courier_notice()
    {
        $couriers = $this->courierRepository->getCourierNotices();
        $this->render('courier_notice', ['couriers' => $couriers]);
    }


    public function addCourierNotice()
    {
        if ($this->isPost()) {
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

            return $this->render('courier_notice', [
                'messages' => $this->message,
                'couriers' => $this->courierRepository->getCourierNotices()
            ]);
        }
        return $this->render('add_courier_notice', ['messages' => $this->message]);
    }
}