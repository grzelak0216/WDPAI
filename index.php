<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('profile_notice', 'DefaultController');
Router::get('quotation', 'DefaultController');
Router::get('info_transport_notice', 'DefaultController');
Router::get('info_courier_notice', 'DefaultController');
Router::get('transport_notice', 'DefaultController');
Router::get('courier_notice', 'DefaultController');

Router::post('addTransportNotice', 'TransportController');
Router::post('addCourierNotice', 'CourierController');
Router::post('login', 'SecurityController');
Router::post('registration', 'SecurityController');

Router::run($path);