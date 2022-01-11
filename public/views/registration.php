<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href = "public/css/style_registration.css">
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
                    <output>From Random</output>
                    <output> For You</output>
                </div>
            </div>
    
            <form class="statute_form" action="registration" method="POST">
                <output>Regulamin1</output>
                <output>Regulamin2</output>

            </form>
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