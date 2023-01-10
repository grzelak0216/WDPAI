<header>
    <ul>
        <li id="burger"><a href="#"><i class="fas fa-bars"></i></a></li>
        <li>
            <?php
            $user_array = json_decode($_COOKIE['user'], true);
            if ($user_array) {
                $logUsers = new User($user_array['email'], $user_array['password'], $user_array['name'], $user_array['surname'], $user_array['phone_number'], $user_array['order_number']);
                if (isset($_COOKIE['admin'])){
                    echo '<i class="fa-solid fa-screwdriver-wrench"></i>';
                } else {
                    echo '<i class="fas fa-user-circle"></i>';
                }
                echo $logUsers->getName();
            } else {
                echo '<a href="http://localhost:8080/login">Log in!</a>';
            }
            ?>
        </li>
    </ul>
    <div class="header_logo">
        <a href="http://localhost:8080"><img src="public/img/logo.svg"></a>
    </div>
    <div class="option-container">
        <ul>
            <?php
            if(isset($_COOKIE['user'])){
                echo '<li><a href="http://localhost:8080">Start</a></li>
                        <li><a href="http://localhost:8080/profile_notice">Profil</a></li> 
                        <li><a href="http://localhost:8080/quotation">Wycena</a></li> 
                        <li><a href="http://localhost:8080/chat">Chat</a></li> 
                        <li><a href="http://localhost:8080/logout">Wyloguj</a></li>
                        <li><a href="http://localhost:8080/courier_notice">Szukaj ogłoszenie kurierskie</a></li>
                        <li><a href="http://localhost:8080/transport_notice">Szukaj ogłoszenie transportu</a></li> 
                        <li><a href="http://localhost:8080/addTransportNotice">Dodaj ogłoszenie transportu</a></li> 
                        <li><a href="http://localhost:8080/addCourierNotice">Dodaj ogłoszenie kurierskie</a></li>';
            } else {
                echo '<li><a href="http://localhost:8080/registration">Zajerestruj</a></li>
                        <li><a href="http://localhost:8080/login">Zaloguj</a></li>';
            }
            ?>
        </ul>
    </div>
</header>