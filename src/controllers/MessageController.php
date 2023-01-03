<?php

require_once 'AppController.php';
require_once 'MessageRepository.php';

class MessageController extends AppController {

    public function send($recipientId, $message) {
        $messageRepository = new MessageRepository();
        $messageRepository->send($recipientId, $message);
    }

}