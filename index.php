<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('profile_notice', 'DefaultController');
Router::get('quotation', 'DefaultController');
Router::get('info_transport_notice', 'DefaultController');
Router::get('info_courier_notice', 'DefaultController');

Router::get('transport_notice', 'TransportController');
Router::get('courier_notice', 'CourierController');

Router::post('search', 'TransportController');

Router::post('addTransportNotice', 'TransportController');
Router::post('addCourierNotice', 'CourierController');
Router::post('login', 'SecurityController');
Router::post('registration', 'SecurityController');

Router::get('logout', 'SecurityController');

Router::get('map', 'MapController');
Router::get('places', 'MapController');

Router::run($path);