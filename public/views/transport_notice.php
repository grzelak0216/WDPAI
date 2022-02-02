<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style_transport_notice.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>PROJECTS</title>
</head>

<body>
    <header>
        <div class="header_logo">
            <img src="public/img/logo.svg">
        </div>
        <ul>
            <li id="search"><a href="#"><i class="fas fa-search"></i> Szukaj</a></li>
            <li id="add"><a href="#"><i class="far fa-calendar-plus"></i> Dodaj ogłoszenie</a></li>
            <li><a href="#"><i class="fas fa-list"></i> Rezerwacje</a></li>
            <li>
                <?php
                $user_array = json_decode($_COOKIE['user'], true);
                if ($user_array) {
                    $logUsers = new User($user_array['email'], $user_array['password'], $user_array['name'], $user_array['surname']);
                    echo $logUsers->getName();
                }
                ?>
                <i class="fas fa-user-circle"></i>
            </li>
            <li id="burger"><a href="#"><i class="fas fa-bars"></i></a></li>
        </ul>
        <div class="option-container">
            <ul>
                <li><a href="http://localhost:8080/profile_notice">Profil</a></li>
                <li><a href="http://localhost:8080/quantition">Wycena</a></li>
                <li><a href="http://localhost:8080/logout">Wyloguj</a></li>
            </ul>
        </div>
        <div class="option-search">
            <ul>
                <li><a href="http://localhost:8080/courier_notice">Szukaj ogłoszenie kurierskie</a></li>
                <li><a href="http://localhost:8080/transport_notice">Szukaj ogłoszenie transportu</a></li>
            </ul>
        </div>
        <div class="option-add">
            <ul>
                <li><a href="http://localhost:8080/addTransportNotice">Dodaj ogłoszenie kurierskie</a></li>
                <li><a href="http://localhost:8080/addCourierNotice">Dodaj ogłoszenie transportu</a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <div class="route_search">
            <h2>Szukaj trasy: </h2>
            <input name="startCity" type="text" placeholder="Miasto poczatkowe">
            <i class="fas fa-arrow-right"></i>
            <input name="endCity" type="text" placeholder="Miasto koncowe">
        </div>
        <h1>Ogłoszenia:</h1>
        <section class="orders1">
            <?php foreach($items as $item): ?>
                <div id="orders-1">
                    <img src="public/uploads/<?= $item->getFile(); ?>">
                    <div class="order">
                        <h2>
                            <img src="public/img/tmp_user.svg">
                            <output><?=$item->getCreatorName(); ?> <?= $item->getCreatorSurname();?></output>
                        </h2>
                        <div class="order_info">
                            <i class="fas fa-city"> Miasto poczatkowe: <?= $item->getStartCity(); ?></i>
                            <i class="fas fa-city"> Miasto koncowe: <?= $item->getEndCity(); ?></i>
                            <i class="fas fa-luggage-cart"> Typ: <?= $item->getType(); ?></i>
                            <i class="fas fa-coins"> Zapłata: <?= $item->getPayment(); ?></i>
                        </div>
                    </div>
                    <button class="button">Sprawdz</button>
                </div>
            <?php endforeach; ?>
        </section>
    </div>

    <footer>
        <div class="support_bar">
            <a href="#">Regulamin</a>
            <a href="#">O nas</a>
            <a href="#">Centrum pomocy</a>
        </div>
        <div class="socialmedia_bar">
            <a href="https://www.youtube.com/">
                <i class="fab fa-youtube"></i>
            </a>
            <a href="https://twitter.com/">
                <i class="fab fa-twitter-square"></i>
            </a>
            <a href="https://www.facebook.com/">
                <i class="fab fa-facebook-square"></i>
            </a>
            <a href="https://www.instagram.com/">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </footer>
</body>

<template id="transport_notice-template">
    <div id="">
        <img src="">
        <div>
            <h2>
                <img src="public/img/tmp_user.svg">
                <output>Imie</output>
                <output>Nazwisko</output>
            </h2>
            <div>
                <i class="fas fa-city startCity"> startCity</i>
                <i class="fas fa-city endCity"> endCity:</i>
                <i class="fas fa-luggage-cart type"> type</i>
                <i class="fas fa-coins payment"> payment</i>
                <i class="fas fa-route extraRoute"> extraRoute</i>
            </div>

        </div>
        <button class="button">Sprawdz</button>
    </div>
<template>

</html>
