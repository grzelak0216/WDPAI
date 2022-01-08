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
            $item['startCity'],
            $item['startStreet'],
            $item['startNumber'],
            $item['endCity'],
            $item['endStreet'],
            $item['endNumber'],
            $item['width'],
            $item['height'],
            $item['depth'],
            $item['name'],
            $item['type'],
            $item['payment'],
            $item['time'],
            $item['passengers'],
            $item['file'],
            $item['description']
            );
    }

    public function add_transport_notice(Item $item): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO transport_notices (start_city, start_street, start_number, end_city, end_street, end_number, width, name, type, payment, time, passengers, description, ID_creator, height, depth, image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $assignedById = 1;

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
            $date->format('Y-m-d'),
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
                $item['startCity'],
                $item['startStreet'],
                $item['startNumber'],
                $item['endCity'],
                $item['endStreet'],
                $item['endNumber'],
                $item['width'],
                $item['height'],
                $item['depth'],
                $item['name'],
                $item['type'],
                $item['payment'],
                $item['time'],
                $item['passengers'],
                $item['file'],
                $item['description']
            );
        }

        return $result;
    }
}