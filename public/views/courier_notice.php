<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href = "public/css/style_reservations.css">
    <link rel="stylesheet" type = "text/css" href = "public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
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
            <div class="route_info">
                <output>ogłoszenia:</output>
                <div class="route">
                    <output>Trasa:</output>
                    <output>Miasto1</output>
                    <i class="fas fa-arrow-right"></i>
                    <output>Miasto2</output>
                </div>
            </div>
    
            <section class="orders">
                <?php foreach($couriers as $courier): ?>
                    <div id="orders-1">
                        <div class="route">
                            <i class="fas fa-city"><?= $courier->getStartCity();?></i>
                            <i class="fas fa-arrow-right"></i>
                            <i class="fas fa-city"><?= $courier->getEndCity();?></i>
                        </div>
                        <i class="fas fa-city"> Data: <?= $courier->getDeadline(); ?></i>
                        <div class="order-info">
                            <i class="fas fa-luggage-cart"> Maksymalny rozmiar: <?= $courier->getMaxSize(); ?></i>
                            <i class="fas fa-coins"> Dodatkowa trasa: <?= $courier->getExtraRoad(); ?></i>
                            <i class="fas fa-route"> Auto: <?= $courier->getBrand(); ?> <?= $courier->getModel(); ?></i>
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
    
            <div class="buttons">
                <button class="button">Powrót</button>
            </div>
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
</html>