<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier notice</title>
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
<!--    <link rel="stylesheet" href="public/css/primitive.css">-->
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">

    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>

    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>

    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
</head>

<body>
    <?php include "header_bar.php"; ?>

    <div class="container">
        <div class="t1">
            <div class="t2">
                <h1>Ogłoszenia:</h1>
                <section id="couriers-travels" class="couriers-travels orders2">
                    <?php $index = 0; ?>
                    <?php foreach($couriers as $courier): ?>
                        <div
                            id="courier-single-<?php echo $index; ?>"
                            class="courier-single"
                            data-start-alt="<?php echo $courier->getStartAlt(); ?>"
                            data-start-long="<?php echo $courier->getStartLong(); ?>"
                            data-end-alt="<?php echo $courier->getEndAlt(); ?>"
                            data-end-long="<?php echo $courier->getEndLong(); ?>"

                        >
                            <div id='map-<?php echo $index; ?>'></div>
                            <?php $index = $index+1; ?>
                            <div class="order-info">
                                <span><i class="fas fa-city"></i> <b>Start:</b> <?= $courier->getStartName();?> <i class="fas fa-arrow-right"></i></span>
                                <span><i class="fas fa-city"></i> <b>End:</b> <?= $courier->getEndName();?></span>
                                <span><i class="fas fa-city"></i> <b>Data:</b> <?= $courier->getDeadline(); ?></span>
                                <span><i class="fas fa-luggage-cart"></i> <b>Maksymalny rozmiar:</b> <?= $courier->getMaxSize(); ?> cm</span>
                                <span><i class="fas fa-coins"></i> <b>Dodatkowa trasa:</b> +<?= $courier->getExtraRoad(); ?>km</span>
                                <span><i class="fas fa-route"></i> <b>Auto:</b> <?= $courier->getBrand(); ?> <?= $courier->getModel(); ?> <?= $courier->getYear(); ?></span>
                                <span><i class="fas fa-user-circle"></i> <b>Author:</b> <?=$courier->getCreatorName(); ?> <?= $courier->getCreatorSurname();?></span>
                                <span><a class="check" href="http://localhost:8080/info_courier_notice?hidden=<?= $courier->getId(); ?>">Sprawdz</a></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
        </div>
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
