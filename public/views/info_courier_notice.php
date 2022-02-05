<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <script type="text/javascript" src="./public/js/addNotification.js" defer></script>

    <!--    <link rel="stylesheet" href="public/css/primitive.css">-->
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/map.css">
    <title>PROJECTS</title>
</head>

<body>
    <?php include "header_bar.php"; ?>

    <div id="<?= $courier->getId(); ?>" class="container">
        <div class="route_info">
            <div class="route">
                <span><i class="far fa-circle"><?= $courier->getStartName(); ?> </i><i class="fas fa-arrow-down"></i> <i class="far fa-circle"><?= $courier->getEndName(); ?></i> </span>
            </div>
            <div class="date">
                <span><i class="far fa-calendar-alt"><b>Data:</b> </i><?= $courier->getDeadline(); ?></span>
            </div>
        </div>

        <div class="curier_info">
            <div class="curier">
                <span><i class="fas fa-user-circle"></i> <?= $courier->getCreatorName(); ?> <?= $courier->getCreatorSurname(); ?></span>
            </div>
            <div class="career_info">
                <span><b>Wykonane zlecenia:</b> 0</span>
            </div>
        </div>

        <div id='map-<?= $courier->getId(); ?>'></div>

        <div class="notice_info" id="<?= $courier->getId(); ?>">
            <div class="data">
                <span><i class="fas fa-luggage-cart"></i> <b>Maksymalny rozmiar:</b> <?= $courier->getMaxSize(); ?> cm</span>
                <span><i class="fas fa-coins"></i> <b>Dodatkowa trasa:</b> +<?= $courier->getExtraRoad(); ?>km</span>
                <span><i class="fas fa-route"></i> <b>Auto:</b> <?= $courier->getBrand(); ?> <?= $courier->getModel(); ?> <?= $courier->getYear(); ?></span>
            </div>
            <button class="addCourierButton">Dodaj</button>
        </div>
    </div>

    <?php include "footer_bar.php"; ?>
</body>
</html>
