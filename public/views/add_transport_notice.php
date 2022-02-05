<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style_add_transport_notice.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <title>PROJECTS</title>
</head>

<body>
    <?php include "header_bar.php"; ?>

    <div class="container">
        <form action="addTransportNotice" method="POST" ENCTYPE="multipart/form-data">
            <h1>Wprowadz dane </h1>
            <div class="startCity">
                <label><i class="fas fa-box">Adres początkowy: </i></label>
                <input name="startCity" type="text" placeholder="Miasto poczatkowe">
                <input name="startStreet" type="text" placeholder="Nazwa ulicy">
                <input name="startNumber" type="text" placeholder="Numer lokalu">
            </div>

            <div class="endCityName">
                <label><i class="fas fa-box">Adres końcowy: </i></label>
                <input name="endCity" type="text" placeholder="Miasto Koncowe">
                <input name="endStreet" type="text" placeholder="Nazwa ulicy">
                <input name="endNumber" type="text" placeholder="Numer lokalu">
            </div>

            <div class="name">
                <label><i class="fas fa-box">Nazwa przedmiotu: </i></label>
                <input name="name" type="text" placeholder="Nazwa">
            </div>

            <div class="size">
                <div class="width">
                    <label><i class="fas fa-expand-alt">Szerokosc: </i></label>
                    <input name="width" type="number" placeholder="Szerokosc">
                </div>
                <div class="height">
                    <label><i class="fas fa-expand-alt">Wysokosc: </i></label>
                    <input name="height" type="number" placeholder="Wysokosc">
                </div>
                <div class="depth">
                    <label><i class="fas fa-expand-alt">Glebokosc: </i></label>
                    <input name="depth" type="number" placeholder="Glebokosc">
                </div>
            </div>

            <div class="type">
                <label><i class="fas fa-luggage-cart">Typ: </i></label>
                <input name="type" type="text" placeholder="Typ">
            </div>
            <div class="payment">
                <label><i class="fas fa-coins">Wynagrodzenie: </i></label>
                <input name="payment" type="number" placeholder="Wynagrodzenie">
            </div>
            <div class="time">
                <label><i class="fas fa-hourglass-half">Czas: </i></label>
                <input name="time" type="date" placeholder="Czas">
            </div>
            <div class="passengers">
                <label><i class="fas fa-user-plus">Pasażerowie: </i></label>
                <input name="passengers" type="number" placeholder="Pasażerowie">
            </div>

            <input type="file" name="file"/><br/>

            <div class="description">
                <label><i class="fas fa-file-alt">Opis: </i></label>
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

            <div class="buttons">
                <button type="reset" class="button muted-button">Reset</button>
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

    <?php include "footer_bar.php"; ?>
</body>
</html>
