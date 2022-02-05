<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add courier notice</title>
    <!-- <link rel="stylesheet" type="text/css" href="public/css/style_add_courier_notice.css"> -->
    <link rel="stylesheet" href="public/css/primitive.css">
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">

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

    <form action="/addCourierNotice" class="data" method="post" ENCTYPE="multipart/form-data">
        <div class="container">
            <h1>Wprowadź dane podóży</h1>
            <div class="flex-row">
                <div class="flex-small">
                    <div class="startCity">
                        <label><i class="fas fa-hourglass-half"></i> Start city</label>
                        <div id="map-start-city"></div>
                        <input id="map-start-city-name" name="start_name" type="text" placeholder="Miasto poczatkowe" >
                        <input id="map-start-city-alt" name="start_alt" type="text" placeholder="ALT">
                        <input id="map-start-city-long" name="start_long" type="text" placeholder="LONG">
                    </div>

                    <label><i class="fas fa-hourglass-half"></i> Data</label>
                    <input name="deadline" type="date" placeholder="Data">

                    <label><i class="fas fa-hourglass-half"></i> Marka</label>
                    <input name="brand" type="text" placeholder="Marka">

                    <label><i class="fas fa-hourglass-half"></i> Model</label>
                    <input name="model" type="text" placeholder="Model">

                    <label><i class="fas fa-hourglass-half"></i> Rocznik</label>
                    <input name="year" type="text" placeholder="Rocznik">

                    <label><i class="fas fa-hourglass-half"></i> Rejestracja</label>
                    <input name="registration" type="text" placeholder="Rejestracja">
                </div>
                <div class="flex-small">
                    <div class="endCityName">
                        <label><i class="fas fa-hourglass-half"></i> End city</label>
                        <div id="map-end-city" ></div>
                        <input id="map-end-city-name" name="end_name" type="text" placeholder="Miasto końcowe">
                        <input id="map-end-city-alt" name="end_alt" type="text" placeholder="ALT">
                        <input id="map-end-city-long" name="end_long" type="text" placeholder="LONG">
                    </div>

                    <label><i class="fas fa-box"></i> Maksymalna dodatkowa trasa</label>
                    <input name="extraRoad" type="number" placeholder="Maksymalna dodatkowa trasa">

                    <label><i class="fas fa-box"></i> Maksymalny rozmiar przesylki</label>
                    <input name="maxSize" type="number" placeholder="Maksymalny rozmiar przesylki">

                    <label><i class="fas fa-file-alt"></i> Maksymalny rozmiar przesylki</label>
                    <textarea name="description" type="text" placeholder="Opis"></textarea>
                </div>
            </div>

            <div class="buttons">
                <button type="reset" class="button muted-button">Reset</button>
                <button type="submit" class="button">Zapisz</button>
            </div>
        </div>

        <div class="messages">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
    </form>

    <?php include "footer_bar.php"; ?>
</div>
<script type="text/javascript" src="./public/js/renderMap.js"></script>
<script>
    (function() {
        renderMapOnAddCourierNotice();
    })();
</script>
</body>
</html>
