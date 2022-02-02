
<header>
    <div class="header_logo">
        <img src="public/img/logo.svg">
    </div>
    <ul>
        <li id="search"><a href="#"><i class="fas fa-search"></i> Szukaj</a></li>
        <li id="add"><a href="#"><i class="far fa-calendar-plus"></i> Dodaj ogłoszenie</a></li>
        <li><a href="#"><i class="fas fa-list"></i> Rezerwacje</a></li>
        <li>
            <?php
            $user_array = json_decode($_COOKIE['user'], true);
            if ($user_array) {
                $logUsers = new User($user_array['email'], $user_array['password'], $user_array['name'], $user_array['surname']);
                echo $logUsers->getName();
            }
            ?>
            <i class="fas fa-user-circle"></i>
        </li>
        <li id="burger"><a href="#"><i class="fas fa-bars"></i></a></li>
    </ul>
    <div class="option-container">
        <ul>
            <li><a href="http://localhost:8080/profile_notice">Profil</a></li>
            <li><a href="http://localhost:8080/quantition">Wycena</a></li>
            <li><a href="http://localhost:8080/logout">Wyloguj</a></li>
        </ul>
    </div>
    <div class="option-search">
        <ul>
            <li><a href="http://localhost:8080/courier_notice">Szukaj ogłoszenie kurierskie</a></li>
            <li><a href="http://localhost:8080/transport_notice">Szukaj ogłoszenie transportu</a></li>
        </ul>
    </div>
    <div class="option-add">
        <ul>
            <li><a href="http://localhost:8080/addTransportNotice">Dodaj ogłoszenie kurierskie</a></li>
            <li><a href="http://localhost:8080/addCourierNotice">Dodaj ogłoszenie transportu</a></li>
        </ul>
    </div>
</header>