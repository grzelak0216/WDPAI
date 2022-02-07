<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <title>PROJECTS</title>
</head>
<body>
    <?php include "header_bar.php"; ?>

    <div class="container-login">
        <div class="web_slogan">
            <div class="logo">
                <img src="public/img/logo.svg">
            </div>
            <div class="slogan">
                <span><b>From Random</b></span>
                <span><b>For You</b></span>
            </div>
        </div>

        <div class="login">
            <form class="login" action="login" method="POST">
                <h1> Podaj adres e-mail i hasło </h1>
                <input name="email" type="text" placeholder="E-mail">
                <input name="password" type="password" placeholder="Hasło">
                <div class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
                <span><a href="http://localhost:8080/registration">Zajerestruj</a></span>
                <button class="button" type="submit">Zaloguj</button>
            </form>

        </div>
    </div>

    <?php include "footer_bar.php"; ?>
</body>
</html>
