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

    public function info_courier_notice()
    {
        $id = $_GET['hidden'];
        $courier = $this->courierRepository->getCourierNoticeInfo($id);
        $this->render('info_courier_notice', ['courier' => $courier]);
    }


    public function addCourierNotice()
    {
        if ($this->isPost()) {
            // TODO create new project object and save it in database
            $courier = new Courier(
                $_POST['start_name'],
                $_POST['start_alt'],
                $_POST['start_long'],
                $_POST['end_name'],
                $_POST['end_alt'],
                $_POST['end_long'],
                $_POST['extraRoad'],
                $_POST['maxSize'],
                $_POST['description'],
                $_POST['deadline'],
                $_POST['brand'],
                $_POST['model'],
                $_POST['year'],
                $_POST['registration'],
                $_POST['creatorName'],
                $_POST['creatorSurname'],
                $_POST['id']
            );

            $this->courierRepository->addCourierNotice($courier);

            return $this->render('courier_notice', [
                'messages' => $this->message,
                'couriers' => $this->courierRepository->getCourierNotices()
            ]);
        }
        return $this->render('add_courier_notice', ['messages' => $this->message]);
    }

    public function search()
    {
        echo json_encode($this->courierRepository->getProjectByCities());
    }

    public function addCourierNoticeToUser(int $ci_id)
    {
        $this->courierRepository->addCourierNotificationToUser($ci_id);
        http_response_code(200);
    }

    public function dropCourierNoticeToUser(int $ci_id)
    {
        $this->courierRepository->dropCourierNotificationToUser($ci_id);
        http_response_code(200);
    }

    public function removeCourierNotice(int $ci_id)
    {
        $this->courierRepository->rmCourierNotification($ci_id);
        http_response_code(200);
    }
}
