<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bbd5fb75aa.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <script type="text/javascript" src="./public/js/addNotification.js" defer></script>
    <link rel="stylesheet" type="text/css" href="public/css/style_notice.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>PROJECTS</title>
</head>

<body>

    <?php include "header_bar.php"; ?>

    <div id="<?= $item->getId(); ?>" class="container">
        <div class="route">
            <span><?= $item->getStartCity(); ?> <i class="fas fa-arrow-right"></i> <?= $item->getEndCity(); ?></span>
        </div>

        <div class="transport_info" >

            <div class="view_item">
                <img src="public/uploads/<?= $item->getFile(); ?>">
            </div>

            <div class="notice_info" id="<?= $item->getId(); ?>">
                <div class="customers">
                    <span><i class="fas fa-user-circle"></i> <?= $item->getCreatorName(); ?> <?= $item->getCreatorSurname(); ?></span>
                </div>
                <div class="data">
                    <span><i class="fas fa-box"><b>Nazwa:</b></i> <?= $item->getName(); ?></span>
                    <span><i class="fas fa-expand-alt"><b>Rozmiar:</b></i> <?= $item->getWidth(); ?> <b>x</b> <?= $item->getHeight(); ?> <b>x</b> <?= $item->getDepth(); ?></span>
                    <span><i class="fas fa-luggage-cart"><b>Typ:</b></i> <?= $item->getType(); ?></span>
                    <span><i class="fas fa-coins"><b>Zaplata:</b></i> <?= $item->getPayment(); ?></span>
                    <span><i class="fas fa-hourglass-half"><b>Czas:</b></i> <?= $item->getTime(); ?></span>
                    <span><i class="fas fa-user-plus"><b>Pasażerowie:</b></i> <?= $item->getPassengers(); ?></span>
                    <span><i class="fas fa-file-alt"><b>Opis:</b></i> <?= $item->getDescription(); ?></span>
                </div>
                <button class="addTransportButton">Dodaj</button>
            </div>
        </div>
    </div>

    <?php include "footer_bar.php"; ?>
</body>
</html>
