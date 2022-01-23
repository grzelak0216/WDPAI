<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href = "public/css/style_courier_notice.css">
    <link rel="stylesheet" type = "text/css" href = "public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>PROJECTS</title>
</head>

<body>
<div class="base-container">
    <header>
        <div class = "header_logo">
            <img src="public/img/logo.svg">
        </div>
        <ul>
            <li>
                <i class="fas fa-search"></i>
                <a herf="#" class = "button">Szukaj</a>
            </li>
            <li>
                <i class="far fa-calendar-plus"></i>
                <a herf="#" class = "button">Dodaj ogłoszenie</a>
            </li>
            <li>
                <i class="fas fa-list"></i>
                <a herf="#" class = "button">Rezerwacje</a>
            </li>
            <li>
                <output>Imie</output>
                <i class="fas fa-user-circle"></i>
            </li>
            <li>
                <i class="fas fa-bars"></i>
            </li>
        </ul>

    </header>

    <div class="break_bars">
    </div>

    <div class="container">
        <div class="route_search">
            <h2>Szukaj trasy: </h2>
            <input name="startCity" type="text" placeholder="Miasto poczatkowe">
            <i class="fas fa-arrow-right"></i>
            <input name="endCity" type="text" placeholder="Miasto koncowe">
        </div>
        <h1>Ogłoszenia:</h1>

        <section class="orders2">
            <?php foreach($couriers as $courier): ?>
                <div id="orders-1">
                    <div>

                    </div>
                    <div class="route">
                        <i class="fas fa-city"><?= $courier->getStartCity();?></i>
                        <i class="fas fa-arrow-right"></i>
                        <i class="fas fa-city"><?= $courier->getEndCity();?></i>
                    </div>

                    <div class="order-info">
                        <i class="fas fa-city"> Data: <?= $courier->getDeadline(); ?></i>
                        <i class="fas fa-luggage-cart"> Maksymalny rozmiar: <?= $courier->getMaxSize(); ?> cm</i>
                        <i class="fas fa-coins"> Dodatkowa trasa: +<?= $courier->getExtraRoad(); ?>km</i>
                        <i class="fas fa-route"> Auto: <?= $courier->getBrand(); ?> <?= $courier->getModel(); ?> <?= $courier->getYear(); ?></i>
                        <h2>
                            <img src="public/img/tmp_user.svg">
                            <output>Imie</output>
                            <output>Nazwisko</output>
                        </h2>
                    </div>
                    <button class="button">Sprawdź</button>
                </div>
            <?php endforeach; ?>
        </section>
    </div>

    <div class = "lower_bar">
        <div class = "support_bar">
            <div>
                Regulamin
            </div>
            <div>
                O nas
            </div>
            <div>
                Centrum pomocy
            </div>
        </div>
        <div class="socialmedia_bar">
            <div>
                <i class="fab fa-youtube"></i>
            </div>
            <div>
                <i class="fab fa-twitter-square"></i>
            </div>
            <div>
                <i class="fab fa-facebook-square"></i>
            </div>
            <div>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
    </div>
</div>
</body>

<template id="courier_notice-template">
    <div id="">
        <div>
            <i class="fas fa-city startCity"> startCity </i>
            <i class="fas fa-arrow-right"></i>
            <i class="fas fa-city endCity"> endCity </i>
        </div>

        <div>
            <i class="fas fa-city date"> Data </i>
            <i class="fas fa-luggage-cart max_size"> Maksymalny rozmiar </i>
            <i class="fas fa-coins extra_route"> Dodatkowa trasa </i>
            <div>
                <i class="fas fa-route car"> Auto </i>
                <output class="brand"></output>
                <output class="model"></output>
                <output class="year"></output>
            </div>
            <h2>
                <img src="public/img/tmp_user.svg">
                <output>Imie</output>
                <output>Nazwisko</output>
            </h2>
        </div>
        <button class="button">Sprawdź</button>

    </div>
</template>

</html>