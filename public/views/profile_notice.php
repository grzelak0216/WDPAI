<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/style_notice.css">
    <script src="https://kit.fontawesome.com/bbd5fb75aa.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <title>PROJECTS</title>
</head>

<body>

    <?php include "header_bar.php"; ?>

    <main class="wrapper wallpaper profile">

        <?php
        $user_array = json_decode($_COOKIE['user'], true);
        if ($user_array) {
            $logUsers = new User($user_array['email'], $user_array['password'], $user_array['name'], $user_array['surname'], $user_array['phone_number'], $user_array['order_number']);
        }
        ?>

        <div class="profile_info">
            <div class="curier">
                <span><i class="fas fa-user-circle"></i> <?php echo $logUsers->getName() ?> <?php echo $logUsers->getSurname() ?></span>
            </div>
            <div class="contakt">
                <span><b>Adres e-mail:</b> <?php echo $logUsers->getEmail() ?></span>
                <span><b>Numer telefonu:</b> <?php echo $logUsers->getPhone() ?></span>
            </div>
            <div>
                <span><b>Wykonane zlecenia:</b> <?php echo $logUsers->getOrderNumber() ?></span>
            </div>
        </div>

        <div class="notices">
            <span><h3>Ogłoszenia przewozu:</h3></span>
            <section class="item scroll_b">
                <?php foreach($notices[1] as $item): ?>
                    <div id="<?= $item->getId(); ?>">
                        <div class="order">
                            <span><i class="fas fa-user-circle"></i> <?=$item->getCreatorName(); ?> <?= $item->getCreatorSurname();?></span>
                            <span><i class="fas fa-city"> <b>Miasto poczatkowe:</b> <?= $item->getStartCity(); ?></i></span>
                            <span><i class="fas fa-city"> <b>Miasto koncowe:</b> <?= $item->getEndCity(); ?></i></span>
                            <span><i class="fas fa-luggage-cart"> <b>Typ:</b> <?= $item->getType(); ?></i></span>
                            <span><i class="fas fa-coins"> <b>Zapłata:</b> <?= $item->getPayment(); ?></i></span>
                            <span><a class="check" href="http://localhost:8080/info_transport_notice?hidden=<?= $item->getId(); ?>"><i class="fas fa-search"></i></a></span>
                        </div>

                    </div>
                <?php endforeach; ?>
            </section>
            <span><h3>Ogłoszenia kurierskie:</h3></span>
            <section class="courier scroll_b">
                <?php foreach($notices[0] as $courier): ?>
                    <div id="<?= $courier->getId(); ?>">
                        <div class="order">
                            <div>

                                <span><i class="fas fa-city"> <b>Miasto poczatkowe:</b> <?= $courier->getStartName(); ?></i></span>
                                <span><i class="fas fa-city"> <b>Miasto koncowe:</b> <?= $courier->getEndName(); ?></i></span>
                            </div>
                            <div>
                                <span><i class="fas fa-user-circle"></i> <?=$courier->getCreatorName(); ?> <?= $courier->getCreatorSurname();?></span>
                                <span><i class="fas fa-luggage-cart"> <b>auto:</b> <?= $courier->getBrand(); ?> <?= $courier->getModel(); ?> <?= $courier->getYear(); ?></i></span>
                                <span><i class="fas fa-coins"> <b>data:</b> <?= $courier->getDeadLine(); ?></i></span>
                                <span><a class="check" href="http://localhost:8080/info_courier_notice?hidden=<?= $courier->getId(); ?>"><i class="fas fa-search"></i></a></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </main>

    <?php include "footer_bar.php"; ?>
</body>
</html>
