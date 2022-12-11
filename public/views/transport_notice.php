<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport notice</title>
    <link rel="stylesheet" type="text/css" href="public/css/style_notice.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>

    <script src="https://kit.fontawesome.com/bbd5fb75aa.js" crossorigin="anonymous"></script>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>

    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>

    <style>
        .mapboxgl-map {
            width: 100%;
            height: 250px;
        }

        .mapboxgl-map {
            font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
            overflow: hidden;
            position: relative;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
        }
    </style>
</head>

<body>
    <?php include "header_bar.php"; ?>

    <div class="t2">
        <h1>Ogłoszenia:</h1>

        <!-- <div class="route_search">
            <h2>Szukaj trasy: </h2>
            <input name="startCity" type="text" placeholder="Miasto poczatkowe">
            <i class="fas fa-arrow-right"></i>
            <input name="endCity" type="text" placeholder="Miasto koncowe">
        </div> -->

        <section id="couriers-travels" class="couriers-travels orders2">
            <?php $index = 0; ?>
                <?php foreach($items as $item): ?>
                    <div
                        id="item-single-<?php echo $index; ?>"
                        class="courier-single"
                        data-start-alt="<?php echo $item->getStartAlt(); ?>"
                        data-start-long="<?php echo $item->getStartLong(); ?>"
                        data-end-alt="<?php echo $item->getEndAlt(); ?>"
                        data-end-long="<?php echo $item->getEndLong(); ?>"
                    >
                        <div id='map-<?php echo $index; ?>'></div>
                        <?php $index = $index+1; ?>
                        <div class="order_info">
                            <span><i class="fas fa-city"> <b>Miasto poczatkowe:</b> <?= $item->getStartName(); ?></i></span>
                            <span><i class="fas fa-city"> <b>Miasto koncowe:</b> <?= $item->getEndName(); ?></i></span>
                            <span><i class="fas fa-luggage-cart"> <b>Typ:</b> <?= $item->getType(); ?></i></span>
                            <span><i class="fas fa-coins"> <b>Zapłata:</b> <?= $item->getPayment(); ?></i></span>
                            <span><i class="fas fa-coins"> <b>Wymiary:</b> <?= $item->getWidth(); ?> x <?= $item->getHeight(); ?> x <?= $item->getDepth(); ?> cm</i></span>
                            <span><i class="fas fa-user-circle"></i> <b>Author:</b> <?=$item->getCreatorName(); ?> <?= $item->getCreatorSurname();?></span>
                        </div>
                        <span><a class="check" href="http://localhost:8080/info_item_notice?hidden=<?= $item->getId(); ?>">Sprawdz</a></span>
                    </div>
                <?php endforeach; ?>
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
