<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href = "public/css/style_login.css">
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
            <div class="web_slogan">
                <div class="logo">
                    <img src="public/img/logo.svg">
                </div>
                <div class="slogan">
                    <output>From Random</output>
                    <output> For You</output>
                </div>
            </div>
             
            <div class="login-container">
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
                    <button class="button" type="submit">Kontynuuj</button>
                </form>
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