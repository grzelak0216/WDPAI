<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/MessageRepository.php';

$_POST = json_decode(file_get_contents("php://input"), true);

class MessageController extends AppController {


    private $messageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->messageRepository = new MessageRepository();
    }


    public function getMessages(){
        $osoba_a = $_COOKIE["userID"];
        $osoba_b = $_POST['osoba_b'];

        $result = $this->messageRepository->getChat($osoba_a, $osoba_b);
        header('Content-type: application/json');
        echo json_encode($result);
        return;
    }

    public function sendMessage() {
        $osoba_a = $_COOKIE["userID"];
        $osoba_b = $_POST['osoba_b'];
        $message = $_POST['message'];

        $this->messageRepository->send($osoba_a, $osoba_b, $message);
        header('Content-type: application/json');
        echo json_encode("Success");
        return;
    }

}