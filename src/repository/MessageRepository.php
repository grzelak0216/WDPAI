<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Message.php';

class MessageRepository extends Repository {

    public function send($recipientId, $message) {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO messages (recipient_id, messages, sender_id) VALUES (?, ?)'
        );

        $stmt->execute([$recipientId, $message, $_COOKIE["userID"]]);
    }

}