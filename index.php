<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('login', 'DefaultController');
Router::get('registration', 'DefaultController');
Router::get('profile_notice', 'DefaultController');
Router::get('quotation', 'DefaultController');
Router::get('courier_notice', 'DefaultController');
Router::get('reservations', 'DefaultController');
Router::get('transport_notice', 'DefaultController');

Router::run($path);