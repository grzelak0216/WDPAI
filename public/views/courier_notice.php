<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier notice</title>
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
    <script type="text/javascript" src="./public/js/search.js" defer></script>

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

    <div class="popup">
        <form action="" class="searcher visible">
            <div class="startCity">
                <label><i class="fas fa-city"></i> Start city</label>
                <div id="map-start-city"></div>
                <input id="map-start-city-name" name="start_name" type="text" placeholder="Miasto poczatkowe" >
                <input id="map-start-city-alt" name="start_alt" type="text" placeholder="START ALT">
                <input id="map-start-city-long" name="start_long" type="text" placeholder="START LONG">
            </div>
            <div class="endCityName">
                <label><i class="fas fa-city"></i> End city</label>
                <div id="map-end-city" ></div>
                <input id="map-end-city-name" name="end_name" type="text" placeholder="Miasto końcowe">
                <input id="map-end-city-alt" name="end_alt" type="text" placeholder="END ALT">
                <input id="map-end-city-long" name="end_long" type="text" placeholder="END LONG">
            </div>

            <div>
                <label><i class="fas fa-car"></i> Dodatkowa trasa</label>
                <input name="extra" type="number" placeholder="Dodatkowa trasa">
            </div>

            <button id="searcherbt" type="submit" class="button">Sprawdz</button>
        </form> 
    </div>

    <div class="t2">
        <h1>Ogłoszenia:</h1>
        <button id="popupbt">Wyszukaj</button>
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
                            <span><i class="fas fa-city"></i> <b>Start:</b> <?= $courier->getStartName();?></i></span>
                            <span><i class="fas fa-city"></i> <b>Koniec:</b> <?= $courier->getEndName();?></span>
                            <span><i class="fas fa-hourglass-half"></i> <b>Data:</b> <?= $courier->getDeadline(); ?></span>
                            <span><i class="fas fa-luggage-cart"></i> <b>Maksymalny rozmiar:</b> <?= $courier->getMaxSize(); ?> cm</span>
                            <span><i class="fas fa-route"></i></i> <b>Dodatkowa trasa:</b> +<?= $courier->getExtraRoad(); ?>km</span>
                            <span><i class="fas fa-car-side"></i></i> <b>Auto:</b> <?= $courier->getBrand(); ?> <?= $courier->getModel(); ?> <?= $courier->getYear(); ?></span>
                            <span><i class="fas fa-user-circle"></i> <b>Author:</b> <?=$courier->getCreatorName(); ?> <?= $courier->getCreatorSurname();?></span>
                        </div>
                        <span><a class="check" href="http://localhost:8080/info_courier_notice?hidden=<?= $courier->getId(); ?>">Sprawdz</a></span>
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
    (function() {
        renderMapOnAddCourierNotice();
    })();
</script>
</html>
