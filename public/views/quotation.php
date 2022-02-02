<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style_quotation.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/quotation.js" defer></script>
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

    <body>
        <div class="container">
            <ul class="quotation_form">
                <li>
                    <i class="fas fa-arrows"></i>
                    <input name="width" type="number" min="1" placeholder="Szerokość:">
                </li>
                <li>
                    <i class="fas fa-arrows-v"></i>
                    <input name="height" type="number" min="1" placeholder="Wysokość:">
                </li>
                <li>
                    <i class="fas fa-expand-alt"></i>
                    <input name="depth" type="number" min="1" placeholder="Głębokość:">
                </li>
                <li>
                    <i class="fas fa-route"></i>
                    <input name="route" type="number" min="1" placeholder="Długość trasy">
                </li>
            </ul>

            <div class="result">
                <div class="price">
                    <i class="fas fa-coins"></i>
                    <output>Cena:</output>
                    <output class="output-result">0</output>
                </div>
                <button class="calculate-button">Oblicz</button>
            </div>

            <div class="quotation_result">
                <div class="web_slogan">
                    <div class="logo">
                        <img src="public/img/logo.svg">
                    </div>
                    <div class="slogan">
                        <output>From Random</output>
                        <output> For You</output>
                    </div>
                </div>

                <button class="button">Kontynuuj</button>
            </div>
        </div>
    </body>

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
