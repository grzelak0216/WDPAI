<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Courier.php';

class CourierRepository extends Repository
{

    public function getCourierNotice(int $id): ?Courier
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.courier_notices WHERE "ID_creator" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $courier = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($courier == false) {
            return null;
        }

        return new Courier(
            $courier['start_city'],
            $courier['start_street'],
            $courier['end_city'],
            $courier['end_street'],
            $courier['extra_road'],
            $courier['max_size'],
            $courier['description'],
            $courier['date'],
            $courier['car_brand'],
            $courier['car_model'],
            $courier['car_year'],
            $courier['car_registration'],
        );
    }

    public function addCourierNotice(Courier $courier): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO courier_notices (start_city, start_street, end_city, end_street, extra_road, max_size, "ID_creator", date, car_brand, car_model, car_year, car_registration, description)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $assignedById = 3;

        $stmt->execute([
            $courier->getStartCity(),
            $courier->getStartStreet(),
            $courier->getEndCity(),
            $courier->getEndStreet(),
            $courier->getExtraRoad(),
            $courier->getMaxSize(),
            $assignedById,
            $courier->getDeadline(),
            $courier->getBrand(),
            $courier->getModel(),
            $courier->getYear(),
            $courier->getRegistration(),
            $courier->getDescription()
        ]);
    }

    public function getCourierNotices(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM courier_notices;
        ');
        $stmt->execute();
        $couriers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($couriers as $courier) {
            $result[] = new Courier(
                $courier['start_city'],
                $courier['start_street'],
                $courier['end_city'],
                $courier['end_street'],
                $courier['extra_road'],
                $courier['max_size'],
                $courier['description'],
                $courier['date'],
                $courier['car_brand'],
                $courier['car_model'],
                $courier['car_year'],
                $courier['car_registration'],
            );
        }

        return $result;
    }
}