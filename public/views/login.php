<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/bbd5fb75aa.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <title>PROJECTS</title>
</head>
<body>
    <?php include "header_bar.php"; ?>

    <main class="wallpaper">
        <div class="form_wrapper">
            <div class="web_slogan">
                <div class="logo">
                    <img src="public/img/logo.svg">
                </div>
                <div class="slogan">
                    <span><b>From Random</b></span>
                    <span><b>For You</b></span>
                </div>
            </div>
            <div class="separator"></div>
            <form class="login" action="login" method="POST">
                <h1> Enter your email and password </h1>
                <div class="imput_holder">
                    <input name="email" type="text" placeholder="E-mail">
                    <input name="password" type="password" placeholder="Hasło">
                </div>
                <p>If you don't have account <a href="http://localhost:8080/registration">REGISTER</a></p>
                <div class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
                <button class="button" type="submit">Log in</button>
            </form>
        </div>
    </main>

    <?php include "footer_bar.php"; ?>
</body>
</html>
