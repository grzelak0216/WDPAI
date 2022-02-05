<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style_transport_notice.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <script type="text/javascript" src="./public/js/check.js" defer></script>
    <title>PROJECTS</title>
</head>

<body>
    <?php include "header_bar.php"; ?>
    <div class="container">
        <div class="route_search">
            <h2>Szukaj trasy: </h2>
            <input name="startCity" type="text" placeholder="Miasto poczatkowe">
            <i class="fas fa-arrow-right"></i>
            <input name="endCity" type="text" placeholder="Miasto koncowe">
        </div>
        <h1>Ogłoszenia:</h1>
        <section class="orders1">
            <?php foreach($items as $item): ?>
                <div id="<?= $item->getId(); ?>">
                    <img src="public/uploads/<?= $item->getFile(); ?>">
                    <div class="order">
                        <h2>
                            <span><i class="fas fa-user-circle"></i><?=$item->getCreatorName(); ?> <?= $item->getCreatorSurname();?></span>
                        </h2>
                        <div class="order_info">
                            <span><i class="fas fa-city"> <b>Miasto poczatkowe:</b> <?= $item->getStartCity(); ?></i></span>
                            <span><i class="fas fa-city"> <b>Miasto koncowe:</b> <?= $item->getEndCity(); ?></i></span>
                            <span><i class="fas fa-luggage-cart"> <b>Typ:</b> <?= $item->getType(); ?></i></span>
                            <span><i class="fas fa-coins"> <b>Zapłata:</b> <?= $item->getPayment(); ?></i></span>
                        </div>
                    </div>
                    <span><a class="check" href="http://localhost:8080/info_transport_notice?hidden=<?= $item->getId(); ?>">Sprawdz</a></span>
                </div>
            <?php endforeach; ?>

        </section>
    </div>

    <?php include "footer_bar.php"; ?>
</body>

<template id="transport_notice-template">
    <div id="">
        <img src="">
        <div>
            <h2>
                <img src="public/img/tmp_user.svg">
                <output>Imie</output>
                <output>Nazwisko</output>
            </h2>
            <div>
                <i class="fas fa-city startCity"> startCity</i>
                <i class="fas fa-city endCity"> endCity:</i>
                <i class="fas fa-luggage-cart type"> type</i>
                <i class="fas fa-coins payment"> payment</i>
                <i class="fas fa-route extraRoute"> extraRoute</i>
            </div>

        </div>
        <button class="button">Sprawdz</button>
    </div>
<template>

</html>
