<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/bbd5fb75aa.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/quotation.js" defer></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <title>PROJECTS</title>
</head>

<body>
    <?php include "header_bar.php"; ?>

    <main class="wallpaper">
        <div class="form_wrapper">
            <div style="width: 45%; padding-left: 1em">
                <h1>Wprowadz dane</h1>
                <ul class="quotation_form">
                    <li>
                        <label><i class="fas fa-arrows-alt-h"><b>Szerokość:</b> </i></label>
                        <input name="width" type="number" min="1" placeholder="Szerokość">
                    </li>
                    <li>
                        <label><i class="fas fa-arrows-alt-v"><b>Wysokość</b> </i></label>
                        <input name="height" type="number" min="1" placeholder="Wysokość">
                    </li>
                    <li>
                        <label><i class="fas fa-expand-alt"><b>Głębokość:</b> </i></label>
                        <input name="depth" type="number" min="1" placeholder="Głębokość">
                    </li>
                    <li>
                        <label><i class="fas fa-route"><b>Długość trasy:</b> </i></label>
                        <input name="route" type="number" min="1" placeholder="Długość trasy">
                    </li>
                </ul>

                <div class="result">
                    <div class="price">
                        <span><i class="fas fa-coins"><b>Cena:</b></i></span>
                        <output class="output-result">0</output>
                    </div>
                    <button class="calculate-button">Oblicz</button>
                </div>
            </div>

            <div class="separator"></div>

            <div class="web_slogan">
                <div class="logo">
                    <img src="public/img/logo.svg">
                </div>
                <div class="slogan">
                    <span><b>From Random</b></span>
                    <span><b>For You</b></span>
                </div>
            </div>
        </div>
    </main>

    <?php include "footer_bar.php"; ?>
</body>
</html>
