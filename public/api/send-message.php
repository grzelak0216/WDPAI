<?php

// Get recipient ID and message from POST request
$recipientId = $_POST['recipient_id'];
$message = $_POST['message'];

// Include model file
include_once '../models/Message.php';

// Save message to database
Message::send($recipientId, $message);