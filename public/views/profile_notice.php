<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style_profile_notice.css">
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
        <div class="profile_info">
            <div class="foto">
                <img src="public/img/tmp_user.svg">
            </div>
            <div class="curier">
                <output>Name</output>
                <output>Surname</output>
                <output>5/5</output>
                <i class="fas fa-star"></i>
            </div>
            <div class="orders">
                <output>Wykonane zlecenia:</output>
                <output>LICZBA</output>
            </div>
            <div class="sum_route">
                <output>Przejechane kilometry:</output>
                <output>LICZBA</output>
                <output>km</output>
            </div>
            <div class="break_orders">
                <output>Zerwane zlecenia:</output>
                <output>LICZBA</output>
            </div>
            <div class="opinion">
                <output>Opinie:</output>
                <output>LICZBA</output>
            </div>
        </div>

        <div class="comments">

        </div>

        <div class="buttons">
            <button class="button">Dodaj</button>
            <button class="button">Kontynuuj</button>
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
