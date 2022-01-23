<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Item.php';

class TransportRepository extends Repository
{

    public function getTransportNotice(int $id): ?Item
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.transport_notices WHERE "ID_creator" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item == false) {
            return null;
        }

        return new Item(
            $item['start_city'],
            $item['start_street'],
            $item['start_number'],
            $item['end_city'],
            $item['end_street'],
            $item['end_number'],
            $item['width'],
            $item['height'],
            $item['depth'],
            $item['name'],
            $item['type'],
            $item['payment'],
            $item['time'],
            $item['passengers'],
            $item['image'],
            $item['description']
        );
    }

    public function addTransportNotice(Item $item): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO transport_notices (start_city, start_street, start_number, end_city, end_street, end_number, width, name, type, payment, time, passengers, description, "ID_creator", height, depth, image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $assignedById = 3;

        $stmt->execute([
            $item->getStartCity(),
            $item->getStartStreet(),
            $item->getStartNumber(),
            $item->getEndCity(),
            $item->getEndStreet(),
            $item->getEndNumber(),
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
            SELECT * FROM transport_notices;
        ');
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $item) {
            $result[] = new Item(
                $item['start_city'],
                $item['start_street'],
                $item['start_number'],
                $item['end_city'],
                $item['end_street'],
                $item['end_number'],
                $item['width'],
                $item['height'],
                $item['depth'],
                $item['name'],
                $item['type'],
                $item['payment'],
                $item['time'],
                $item['passengers'],
                $item['image'],
                $item['description']
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
}