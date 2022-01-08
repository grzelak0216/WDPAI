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

        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item == false) {
            return null;
        }

        return new Courier(
            $_POST['startCity'],
            $_POST['startStreet'],
            $_POST['endCity'],
            $_POST['endStreet'],
            $_POST['extraRoad'],
            $_POST['maxSize'],
            $_POST['description'],
            $_POST['deadline'],
            $_POST['brand'],
            $_POST['model'],
            $_POST['year'],
            $_POST['registration']
        );
    }

    public function add_courier_notice(Courier $courier): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO transport_notices (start_city, start_street, end_city, end_street, extra_road, max_size, creator, car_brand, date, car_model, car_yera, car_registration)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $assignedById = 1;

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
            $courier->getRegistration()
        ]);
    }
}