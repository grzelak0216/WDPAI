<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style_registration.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <title>PROJECTS</title>
</head>

<body>
    <?php include "header_bar.php"; ?>

    <div class="container">
        <form class="user_form" action="registration" method="POST">
            <output>Uzupełnij dane</output>
            <input name="email" type="text" placeholder="E-mail">
            <input name="password" type="password" placeholder="Hasło">
            <input name="confirmedPassword" type="password" placeholder="Powtórz hasło">
            <input name="name" type="text" placeholder="Imie">
            <input name="surname" type="text" placeholder="Nazwisko">
            <input name="phone" type="text" placeholder="Numer Telefonu">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <button class="button" type="submit">Zatwierdź</button>
        </form>

        <div class="web_slogan">
            <div class="logo">
                <img src="public/img/logo.svg">
            </div>
            <div class="slogan">
                <span><b>From Random</b></span>
                <span><b>For You</b></span>
            </div>
        </div>

        <form class="statute_form" action="registration" method="POST">
            <input type="checkbox" id="reg1" name="reg1">
            <label for="reg1">Regulamin: 1</label>
            <input type="checkbox" id="reg2" name="reg2">
            <label for="reg2">Regulamin: 2</label>
        </form>
    </div>

    <?php include "footer_bar.php"; ?>
</body>
</html>
