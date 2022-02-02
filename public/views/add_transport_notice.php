<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style_add_transport_notice.css">
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
        <form action="addTransportNotice" method="POST" ENCTYPE="multipart/form-data">
            <h1>Wprowadz dane </h1>
            <div class="startCity">
                <i class="fas fa-box"></i>
                <input name="startCity" type="text" placeholder="Miasto poczatkowe">
                <input name="startStreet" type="text" placeholder="Nazwa ulicy">
                <input name="startNumber" type="text" placeholder="Numer lokalu">
            </div>

            <div class="endCityName">
                <i class="fas fa-box"></i>
                <input name="endCity" type="text" placeholder="Miasto Koncowe">
                <input name="endStreet" type="text" placeholder="Nazwa ulicy">
                <input name="endNumber" type="text" placeholder="Numer lokalu">
            </div>

            <div class="name">
                <i class="fas fa-box"></i>
                <input name="name" type="text" placeholder="Nazwa przedmiotu">
            </div>

            <div class="size">
                <div class="width">
                    <i class="fas fa-expand-alt"></i>
                    <input name="width" type="number" placeholder="Nazwa">
                </div>
                <div class="height">
                    <i class="fas fa-expand-alt"></i>
                    <input name="height" type="number" placeholder="Wysokosc">
                </div>
                <div class="depth">
                    <i class="fas fa-expand-alt"></i>
                    <input name="depth" type="number" placeholder="Glebokosc">
                </div>
            </div>

            <div class="type">
                <i class="fas fa-luggage-cart"></i>
                <input name="type" type="text" placeholder="Typ">
            </div>
            <div class="payment">
                <i class="fas fa-coins"></i>
                <input name="payment" type="number" placeholder="Wynagrodzenie">
            </div>
            <div class="time">
                <i class="fas fa-hourglass-half"></i>
                <input name="time" type="date" placeholder="Czas">
            </div>
            <div class="passengers">
                <i class="fas fa-user-plus"></i>
                <input name="passengers" type="number" placeholder="Pasażerowie">
            </div>

            <input type="file" name="file"/><br/>

            <div class="description">
                <i class="fas fa-file-alt"></i>
                <textarea name="description" rows="5" type="text" placeholder="Opis"></textarea>
            </div>

            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>

            <div class="buttons" >
                <button type="reset" class="button">Reset</button>
                <button type="submit" class="button">Zapisz</button>
            </div>
        </form>

        <div class="web_slogan">
            <div class="logo">
                <img src="public/img/logo.svg">
            </div>
            <div class="slogan">
                <output>From Random</output>
                <output> For You</output>
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
