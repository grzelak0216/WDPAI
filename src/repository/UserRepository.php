<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users u LEFT JOIN users_details ud
            ON u."ID_user" = ud."ID_users_details" WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user == false) {
            return null;
        }

        $cookie_name = "user";
        $cookie_value = json_encode($user);
        setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/");

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['phone_number'],
            $user['order_number']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users ( email, password)
            VALUES ( ?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword()
        ]);

        $email = $user->getEmail();
        $stmt = $this->database->connect()->prepare('
            SELECT "ID_user" FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email',$email, PDO::PARAM_STR);
        $stmt->execute();

        $id = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_details ("ID_users_details",name, surname, phone_number, order_number)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $id["ID_user"],
            $user->getName(),
            $user->getSurname(),
            $user->getPhone(),
            $user->getOrderNumber()
        ]);
    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_details WHERE name = :name AND surname = :surname AND phone_number = :phone AND order_number = :order
        ');
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':surname', $user->getSurname(), PDO::PARAM_STR);
        $stmt->bindParam(':phone', $user->getPhone(), PDO::PARAM_STR);
        $stmt->bindParam(':order', $user->getOrderNumber(), PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['ID_user'];
    }

    public function getUserID(string $email): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user['ID_user'];
    }

    public function getAdmin(string $email): bool
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user['admin'];
    }

    public function removeUserCookies()
    {
        $cookie_name = "user";
        setcookie($cookie_name, null, time() - 86400, "/");
    }

    public function getNotices(int $id): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM transport_notices tn LEFT JOIN users_details ud
            ON tn."ID_creator" = ud."ID_users_details"RIGHT JOIN users_transport_notices un 
                on tn."ID_transport_notice" = un."ID_transport_notices" WHERE un."ID_user" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultItem = [];
        foreach ($items as $item) {
            $resultItem[] = new Item(
                $item['start_name'],
                $item['start_alt'],
                $item['start_long'],
                $item['end_name'],
                $item['end_alt'],
                $item['end_long'],
                $item['width'],
                $item['height'],
                $item['depth'],
                $item['name'],
                $item['type'],
                $item['payment'],
                $item['time'],
                $item['passengers'],
                $item['image'],
                $item['description'],
                $item['name'],
                $item['surname'],
                $item['ID_creator'],
                $item['ID_transport_notice']
            );
        }

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM courier_notices cn LEFT JOIN users_details ud
            ON cn."ID_creator" = ud."ID_users_details" RIGHT JOIN users_courier_notices un
                on cn."ID_courier_notices" = un."ID_courier_notices" WHERE un."ID_users" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $couriers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultCourier = [];
        foreach ($couriers as $courier) {
            $resultCourier[] = new Courier(
                $courier['start_name'],
                $courier['start_alt'],
                $courier['start_long'],
                $courier['end_name'],
                $courier['end_alt'],
                $courier['end_long'],
                $courier['extra_road'],
                $courier['max_size'],
                $courier['description'],
                $courier['date'],
                $courier['car_brand'],
                $courier['car_model'],
                $courier['car_year'],
                $courier['car_registration'],
                $courier['name'],
                $courier['surname'],
                $courier['ID_creator'],
                $courier['ID_courier_notices']
            );
        }

        return array($resultCourier, $resultItem);
    }
}
