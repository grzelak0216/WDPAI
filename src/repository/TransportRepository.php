<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Item.php';

class TransportRepository extends Repository
{

    public function getTransportNotice(int $id): ?Item
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.transport_notices cn LEFT JOIN users_details ud 
            ON cn."ID_creator" = ud."ID_users_details" WHERE "ID_creator" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item == false) {
            return null;
        }

        return new Item(
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
            $item['ID_transport_notice']
        );
    }

    public function getTransportNoticeInfo(int $id): ?Item
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM transport_notices cn LEFT JOIN users_details ud 
            ON cn."ID_creator" = ud."ID_users_details" WHERE "ID_transport_notice" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item == false) {
            return null;
        }

        return new Item(
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
            $item['ID_transport_notice']
        );
    }

    public function addTransportNotice(Item $item): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO transport_notices (start_name, start_alt, start_long, end_name, end_alt, end_long, width, name, type, payment, time, passengers, description, "ID_creator", height, depth, image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $assignedById = $_COOKIE["userID"];

        $stmt->execute([
            $item->getStartName(),
            $item->getStartAlt(),
            $item->getStartLong(),
            $item->getEndName(),
            $item->getEndAlt(),
            $item->getEndLong(),
            $item->getWidth (),
            $item->getName(),
            $item->getType(),
            $item->getPayment(),
            $item->getTime(),
            $item->getPassengers(),
            $item->getDescription(),
            $assignedById,
            $item->getHeight(),
            $item->getDepth(),
            $item->getFile()
        ]);
    }

    public function getTransportNotices(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM transport_notices cn LEFT JOIN users_details ud 
            ON cn."ID_creator" = ud."ID_users_details";
        ');
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $item) {
            $result[] = new Item(
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
                $item['ID_transport_notice']
            );
        }

        return $result;
    }

    public function getProjectByCities(string $startCity, string $endCity)
    {
        $startCity = strtolower($startCity);
        $endCity = strtolower($endCity);

        if ($startCity == null || $endCity == null){
            if ($startCity == null){
                $stmt = $this->database->connect()->prepare('
                    SELECT * FROM transport_notices WHERE LOWER(end_city) LIKE :search
                ');
                $stmt->bindParam(':search', $endCity, PDO::PARAM_STR);
            } else {
                $stmt = $this->database->connect()->prepare('
                    SELECT * FROM transport_notices WHERE LOWER(start_city) LIKE :search
                ');
                $stmt->bindParam(':search', $startCity, PDO::PARAM_STR);
            }
            $stmt->execute();
        } else {
            $stmt = $this->database->connect()->prepare('
                SELECT * FROM transport_notices WHERE LOWER(start_city) = ? AND LOWER(end_city) = ?
            ');
            $stmt->execute(array($startCity, $endCity));
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTransportNotificationToUser(int $ti_id)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_transport_notices ( "ID_user", "ID_transport_notices")
            VALUES ( ?, ?)
        ');

        $stmt->execute([
            $_COOKIE["userID"],
            $ti_id
        ]);
    }
}