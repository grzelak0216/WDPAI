<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style_transport_notice.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
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
        <div class="route">
            <output>MIASTO1</output>
            <i class="fas fa-arrow-right"></i>
            <output>MIASTO2</output>
        </div>

        <div class="transport_info">
            <div class="customers">
                <div class="customers_foto">
                    <img src="public/img/tmp_user.svg">
                </div>
                <div class="customers_info">
                    <output>Name</output>
                    <output>Surname</output>
                    <output>5/5</output>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <div class="view_item">
                <img src="public/img/tmp_map.svg">
            </div>

            <div class="notice_info">
                <div class="data">
                    <div class="name">
                        <i class="fas fa-box"></i>
                        <output>Nazwa:</output>
                    </div>
                    <div class="size">
                        <i class="fas fa-expand-alt"></i>
                        <output>Rozmiar:</output>
                    </div>
                    <div class="type">
                        <i class="fas fa-luggage-cart"></i>
                        <output>Typ:</output>
                    </div>
                    <div class="payment">
                        <i class="fas fa-coins"></i>
                        <output>Zaplata:</output>
                    </div>
                    <div class="time">
                        <i class="fas fa-hourglass-half"></i>
                        <output>Czas:</output>
                    </div>
                    <div class="passengers">
                        <i class="fas fa-user-plus"></i>
                        <output>Pasażerowie:</output>
                    </div>
                    <div class="description">
                        <i class="fas fa-file-alt"></i>
                        <output>Opis:</output>
                    </div>
                </div>
                <div class="buttons">
                    <button class="button">Kontakt</button>
                    <button class="button">Kontynuuj</button>
                </div>
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
</html>
