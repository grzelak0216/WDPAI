<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style_profile_notice.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/ac9bb0216f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <title>PROJECTS</title>
</head>

<body>

    <?php include "header_bar.php"; ?>

    <div class="container">

        <?php
        $user_array = json_decode($_COOKIE['user'], true);
        if ($user_array) {
            $logUsers = new User($user_array['email'], $user_array['password'], $user_array['name'], $user_array['surname'], $user_array['phone_number'], $user_array['order_number']);
        }
        ?>

        <div class="profile_info">
            <div class="curier">
                <span><?php echo $logUsers->getName() ?> <?php echo $logUsers->getSurname() ?></span>
                <span><b>Wykonane zlecenia:</b> <?php echo $logUsers->getOrderNumber() ?></span>
            </div>
            <div class="contakt">
                <span><b>Adres e-mail:</b> <?php echo $logUsers->getEmail() ?></span>
                <span><b>Numer telefonu:</b> <?php echo $logUsers->getPhone() ?></span>
            </div>
        </div>

        <div class="notices">
            <section class="item">
                <?php foreach($notices[1] as $item): ?>
                    <div id="<?= $item->getId(); ?>">
                        <div class="order">
                            <span><?=$item->getCreatorName(); ?> <?= $item->getCreatorSurname();?></span>
                            <span><i class="fas fa-city"> <b>Miasto poczatkowe:</b> <?= $item->getStartCity(); ?></i></span>
                            <span><i class="fas fa-city"> <b>Miasto koncowe:</b> <?= $item->getEndCity(); ?></i></span>
                            <span><i class="fas fa-luggage-cart"> <b>Typ:</b> <?= $item->getType(); ?></i></span>
                            <span><i class="fas fa-coins"> <b>Zapłata:</b> <?= $item->getPayment(); ?></i></span>
                        </div>
                        <span><a class="check" href="http://localhost:8080/info_transport_notice?hidden=<?= $item->getId(); ?>">Q</a></span>
                    </div>
                <?php endforeach; ?>
            </section>
            <section class="courier">
                <?php foreach($notices[0] as $courier): ?>
                    <div id="<?= $courier->getId(); ?>">
                        <div class="order">
                            <span><?=$courier->getCreatorName(); ?> <?= $courier->getCreatorSurname();?></span>
                            <span><i class="fas fa-city"> <b>Miasto poczatkowe:</b> <?= $courier->getStartName(); ?></i></span>
                            <span><i class="fas fa-city"> <b>Miasto koncowe:</b> <?= $courier->getEndName(); ?></i></span>
                            <span><i class="fas fa-luggage-cart"> <b>auto:</b> <?= $courier->getBrand(); ?> <?= $courier->getModel(); ?> <?= $courier->getYear(); ?></i></span>
                            <span><i class="fas fa-coins"> <b>data:</b> <?= $courier->getDeadLine(); ?></i></span>
                        </div>
                        <span><a class="check" href="http://localhost:8080/info_courier_notice?hidden=<?= $courier->getId(); ?>">Q</a></span>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </div>

    <?php include "footer_bar.php"; ?>
</body>
</html>
