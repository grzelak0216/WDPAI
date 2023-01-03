<?php

// Include model file
include_once '../../src/controllers/SecurityController.php';

// Get all users
$users = SecurityController::getAll();

// Return users as JSON
header('Content-Type: application/json');
echo json_encode($users);