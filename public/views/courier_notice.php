<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier notice</title>
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <link rel="stylesheet" href="public/css/primitive.css">
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">

    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>

    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>
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
        <div class="flex-row">
            <div class="flex-small">
                <h1>Ogłoszenia:</h1>
                <section id="couriers-travels" class="couriers-travels orders2">
                    <?php $index = 0; ?>
                    <?php foreach($couriers as $courier): ?>
                        <div
                            id="courier-single-<?php echo $index; ?>"
                            class="courier-single"
                            data-start-alt="<?php echo $courier->getStartAlt(); ?>"
                            data-start-long="<?php echo $courier->getStartLong(); ?>"
                            data-end-alt="<?php echo $courier->getEndAlt(); ?>"
                            data-end-long="<?php echo $courier->getEndLong(); ?>"

                        >
                            <div id='map-<?php echo $index; ?>'></div>
                            <?php $index = $index+1; ?>
                            <div class="order-info">
                                <span><i class="fas fa-city"></i> <b>Start:</b> <?= $courier->getStartName();?> <i class="fas fa-arrow-right"></i></span>
                                <span><i class="fas fa-city"></i> <b>End:</b> <?= $courier->getEndName();?></span>
                                <span><i class="fas fa-city"></i> <b>Data:</b> <?= $courier->getDeadline(); ?></span>
                                <span><i class="fas fa-luggage-cart"></i> <b>Maksymalny rozmiar:</b> <?= $courier->getMaxSize(); ?> cm</span>
                                <span><i class="fas fa-coins"></i> <b>Dodatkowa trasa:</b> +<?= $courier->getExtraRoad(); ?>km</span>
                                <span><i class="fas fa-route"></i> <b>Auto:</b> <?= $courier->getBrand(); ?> <?= $courier->getModel(); ?> <?= $courier->getYear(); ?></span>
                                <span><i class="fas fa-user-circle"></i> <b>Author:</b> <?=$courier->getCreatorName(); ?> <?= $courier->getCreatorSurname();?></span>
                            </div>
                            <button class="button" style="margin-top: 30px;">Sprawdź</button>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
        </div>
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

<script type="text/javascript" src="./public/js/renderMap.js"></script>
<script>
    (function() {
        createMapOfTravels();
    })();
</script>
</html>
