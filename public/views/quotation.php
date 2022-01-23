<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href = "public/css/style_quotation.css">
    <link rel="stylesheet" type = "text/css" href = "public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/quotation.js" defer></script>
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
                    <i class="fas fa-bars" id="burger"></i>
                </li>
            </ul>
            <div class="option-container">
                <ul>
                    <li>Dupa</li>
                    <li>Dupa</li>
                </ul>
            </div>
        </header>

        <div class="break_bars">
        </div>

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