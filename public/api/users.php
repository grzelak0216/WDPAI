<?php

// Include model file
include_once '../models/User.php';

// Get all users
$users = User::getAll();

// Return users as JSON
header('Content-Type: application/json');
echo json_encode($users);