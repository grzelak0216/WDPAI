<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style_start.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <title>PROJECTS</title>
</head>

<body>
    <?php include "header_bar.php"; ?>

    <div class="container">
        <div class="start_search">
            <div>
                <span><b>Przewozy w najniższych cenach</b></span>
            </div>
            <div class="input_bars">
                <div>
                    <label><i class="far fa-circle"></i></label>
                    <input name="start" type="text" placeholder="Miasto wyjazdu:">
                </div>
                <div >
                    <label><i class="far fa-circle"></i></label>
                    <input name="end" type="text" placeholder="Miasto docelowe:">
                </div>
                <div>
                    <label><i class="far fa-calendar-alt"></i></label>
                    <input name="order_date" type="text" placeholder="Data:">
                </div>
                <div>
                    <label><i class="fas fa-car-side"></i></label>
                    <input name="type_of_order" type="text" placeholder="Typ usługi:">
                </div>
                <div>
                    <label><i class="fas fa-search"></i></label>
                </div>
            </div>
        </div>

        <article class="web_advantages">
            <span><i class="fas fa-coins"></i> <b>Oszczędność</b></span>
            <span><i class="fas fa-id-card"></i> <b>Weryfikacja</b></span>
            <span><i class="fas fa-shipping-fast"></i> <b>Szybkość dostaw</b></span>
        </article>
    </div>

    <?php include "footer_bar.php"; ?>
</body>
</html>
