<?php

class Message {
    public $id;
    public $senderId;
    public $recipientId;
    public $timestamp;
    public $content;

    public function __construct($id, $senderId, $recipientId, $timestamp, $content) {
    $this->id = $id;
    $this->senderId = $senderId;
    $this->recipientId = $recipientId;
    $this->timestamp = $timestamp;
    $this->content = $content;
    }
}
