<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bbd5fb75aa.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <script src="https://kit.fontawesome.com/bbd5fb75aa.js" crossorigin="anonymous"></script>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>
    <script type="text/javascript" src="./public/js/removeNoticeDB.js" defer></script>
    <script type="text/javascript" src="./public/js/addNotification.js" defer></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="public/css/style_notice.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>PROJECTS</title>
</head>

<body>
    <?php include "header_bar.php"; ?>

    <div id="<?= $item->getId(); ?>" class="noticeInfoWrapper">
        <section id="couriers-travels" class="notice_info">
        <?php $index = 0; ?>
            <div id="courier-single-<?php echo $index; ?>"
                        class="courier-single"
                        data-start-alt="<?php echo $item->getStartAlt(); ?>"
                        data-start-long="<?php echo $item->getStartLong(); ?>"
                        data-end-alt="<?php echo $item->getEndAlt(); ?>"
                        data-end-long="<?php echo $item->getEndLong(); ?>"
                >

                <div id='map-<?php echo $index; ?>'></div>

                <div class="route_info">
                    <div class="city_info">
                        <span><i class="fas fa-city"><?= $item->getStartName(); ?> </i></span>
                        <span><i class="fas fa-city"><?= $item->getEndName(); ?></i> </span>
                    </div>

                    <div class="view_item">
                        <img src="public/uploads/<?= $item->getFile(); ?>">
                    </div>

                    <div id="<?= $item->getId(); ?>">
                        <div class="preson_info_notice">
                            <div class="curier">
            			<span><i class="fas fa-user-circle"></i> <?= $item->getCreatorName(); ?> <?= $item->getCreatorSurname(); ?></span>
                            </div>
                        </div>

                        <div class="notice_info">
                            <span><i class="fas fa-box"><b>Nazwa:</b></i> <?= $item->getNameItem(); ?></span>
                            <span><i class="fas fa-expand-alt"><b>Rozmiar:</b></i> <?= $item->getWidth(); ?> <b>x</b> <?= $item->getHeight(); ?> <b>x</b> <?= $item->getDepth(); ?></span>
                            <span><i class="fas fa-luggage-cart"><b>Typ:</b></i> <?= $item->getType(); ?></span>
                            <span><i class="fas fa-coins"><b>Zaplata:</b></i> <?= $item->getPayment(); ?></span>
                            <span><i class="fas fa-hourglass-half"><b>Czas:</b></i> <?= $item->getTime(); ?></span>
                            <span><i class="fas fa-user-plus"><b>Pasażerowie:</b></i> <?= $item->getPassengers(); ?></span>
                            <span><i class="fas fa-file-alt"><b>Opis:</b></i> <?= $item->getDescription(); ?></span>
                        </div>
                        <?php
                        if(isset($_COOKIE['admin']) || $_COOKIE["userID"] == $item->getCreatorID()){
                            echo '<button id="remove" class="removeTransportButton">Usun</button>';
                        }
                        ?>
                        <button class="addTransportButton">Dodaj</button>
                    </div>

                </div>


            </div>
        </section>
    </div>

    <?php include "footer_bar.php"; ?>
</body>

<script type="text/javascript" src="./public/js/renderMap.js"></script>
<script>
    (function() {
        createMapOfTravels();
    })();
</script>
</html>
