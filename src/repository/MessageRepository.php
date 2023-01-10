<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Message.php';

class MessageRepository extends Repository {

    public function send($osoba_a, $osoba_b, $message) {
        $stmt = $this->database->connect()->prepare("
            INSERT INTO messages (recipient_id, message, sender_id) VALUES (?, ?, ?)   
        ");

        $stmt->execute([$osoba_b, $message, $osoba_a]);
    }

    public function getChat($osoba_a, $osoba_b){

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM messages WHERE ("recipient_id" = :a AND "sender_id" = :b) OR ("recipient_id" = :b AND "sender_id" = :a)
        ');
        $stmt->bindParam(':a', $osoba_a, PDO::PARAM_INT);
        $stmt->bindParam(':b', $osoba_b, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}