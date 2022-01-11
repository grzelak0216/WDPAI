<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href = "public/css/style_add_courier_notice.css">
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
        <form action="addCourierNotice" class="data" method="post" ENCTYPE="multipart/form-data">
            <h1>Wprowadz dane</h1>
            <div class="startCity">
                <i class="fas fa-box"></i>
                <input name="startCity" type="text" placeholder="Miasto poczatkowe">
                <input name="startStreet" type="text" placeholder="Nazwa ulicy">
            </div>

            <div class="endCityName">
                <i class="fas fa-box"></i>
                <input name="endCity" type="text" placeholder="Miasto Koncowe">
                <input name="endStreet" type="text" placeholder="Nazwa ulicy">
            </div>

            <div class="date">
                <i class="fas fa-hourglass-half"></i>
                <input name="deadline" type="date" placeholder="Data">
            </div>

            <div class="car">
                <div class="brand">
                    <i class="fas fa-hourglass-half"></i>
                    <input name="brand" type="text" placeholder="Marka">
                </div>
                <div class="model">
                    <i class="fas fa-hourglass-half"></i>
                    <input name="model" type="text" placeholder="Model">
                </div>
                <div class="year">
                    <i class="fas fa-hourglass-half"></i>
                    <input name="year" type="text" placeholder="Rocznik">
                </div>
                <div class="registration">
                    <i class="fas fa-hourglass-half"></i>
                    <input name="registration" type="text" placeholder="Rejestracja">
                </div>
            </div>

            <div class="maxExtraRoad">
                <i class="fas fa-box"></i>
                <input name="extraRoad" type="number" placeholder="Maksymalna dodatkowa tarasa">
            </div>

            <div class="maxSize">
                <i class="fas fa-box"></i>
                <input name="maxSize" type="number" placeholder="Maksymalny rozmiar przesylki">
            </div>

            <div class="description">
                <i class="fas fa-file-alt"></i>
                <input name="description" type="text" placeholder="Opis">
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

            <div class="buttons">
                <button type="reset" class="button">Reset</button>
                <button type="submit" class="button">Kontynuuj</button>
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