<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('profile_notice', 'SecurityController');
Router::get('quotation', 'DefaultController');
Router::get('info_transport_notice', 'TransportController');
Router::get('info_courier_notice', 'CourierController');
Router::get('logout', 'SecurityController');
Router::get('addTransportNoticeToUser', 'TransportController');
Router::get('addCourierNoticeToUser', 'CourierController');
Router::get('transport_notice', 'TransportController');
Router::get('courier_notice', 'CourierController');
Router::post('search', 'CourierController');
Router::post('addTransportNotice', 'TransportController');
Router::post('addCourierNotice', 'CourierController');
Router::post('login', 'SecurityController');
Router::post('registration', 'SecurityController');
Router::post('dropTransportNoticeToUser', 'TransportController');
Router::post('dropCourierNoticeToUser', 'CourierController');
Router::post('removeTransportNotice', 'TransportController');
Router::post('removeCourierNotice', 'CourierController');


Router::run($path);