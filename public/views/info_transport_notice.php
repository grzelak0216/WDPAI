<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <script type="text/javascript" src="./public/js/addNotification.js" defer></script>
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <link rel="stylesheet" type="text/css" href="public/css/style_info_transport_notice.css">
    <title>PROJECTS</title>
</head>

<body>

    <?php include "header_bar.php"; ?>

    <div id="<?= $item->getId(); ?>" class="container">
        <div class="route">
            <span><?= $item->getStartCity(); ?> <i class="fas fa-arrow-right"></i> <?= $item->getEndCity(); ?></span>
        </div>

        <div class="transport_info" >
            <div class="customers">
                <span><i class="fas fa-user-circle"></i> <?= $item->getCreatorName(); ?> <?= $item->getCreatorSurname(); ?></span>
            </div>

            <div class="view_item">
                <img src="public/uploads/<?= $item->getFile(); ?>">
            </div>

            <div class="notice_info" id="<?= $item->getId(); ?>">
                <div class="data">
                    <span><i class="fas fa-box"></i> <b>Nazwa:</b> <?= $item->getName(); ?></span>
                    <span><i class="fas fa-expand-alt"></i> <b>Rozmiar:</b>  <?= $item->getWidth(); ?> <b>x</b> <?= $item->getHeight(); ?> <b>x</b> <?= $item->getDepth(); ?></span>
                    <span><i class="fas fa-luggage-cart"></i> <b>Typ:</b> <?= $item->getType(); ?></span>
                    <span><i class="fas fa-coins"></i> <b>Zaplata:</b> <?= $item->getPayment(); ?></span>
                    <span><i class="fas fa-hourglass-half"></i> <b>Czas:</b> <?= $item->getTime(); ?></span>
                    <span><i class="fas fa-user-plus"></i> <b>Pasażerowie:</b> <?= $item->getPassengers(); ?></span>
                    <span><i class="fas fa-file-alt"></i> <b>Opis:</b> <?= $item->getDescription(); ?></span>
                </div>
                <button class="addTransportButton">Dodaj</button>
            </div>
        </div>
    </div>

    <?php include "footer_bar.php"; ?>
</body>
</html>
