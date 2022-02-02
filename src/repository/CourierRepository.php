<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Courier.php';

class CourierRepository extends Repository
{

    public function getCourierNotice(int $id): ?Courier
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.courier_notices cn LEFT JOIN users_details ud
            ON cn."ID_creator" = ud."ID_users_details" WHERE "ID_creator" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $courier = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($courier == false) {
            return null;
        }

        return new Courier(
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
            $courier['surname']
        );
    }

    public function addCourierNotice(Courier $courier): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO courier_notices (start_name, start_alt, start_long, end_name, end_alt, end_long, extra_road, max_size, "ID_creator", date, car_brand, car_model, car_year, car_registration, description)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        // $assignedById = $_COOKIE["userID"];
        $assignedById = 3;

        $stmt->execute([
            $courier->getStartName(),
            $courier->getStartAlt(),
            $courier->getStartLong(),
            $courier->getEndName(),
            $courier->getEndAlt(),
            $courier->getEndLong(),
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
            SELECT * FROM courier_notices cn LEFT JOIN users_details ud
            ON cn."ID_creator" = ud."ID_users_details";
        ');
        $stmt->execute();
        $couriers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($couriers as $courier) {
            $result[] = new Courier(
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
                $courier['surname']
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
                    SELECT * FROM courier_notices WHERE LOWER(end_city) LIKE :search
                ');
                $stmt->bindParam(':search', $endCity, PDO::PARAM_STR);
            } else {
                $stmt = $this->database->connect()->prepare('
                    SELECT * FROM courier_notices WHERE LOWER(start_city) LIKE :search
                ');
                $stmt->bindParam(':search', $startCity, PDO::PARAM_STR);
            }
            $stmt->execute();
        } else {
            $stmt = $this->database->connect()->prepare('
                SELECT * FROM courier_notices WHERE LOWER(start_city) = ? AND LOWER(end_city) = ?
            ');
            $stmt->execute(array($startCity, $endCity));
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
