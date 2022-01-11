<?php

class Courier {
    private $startCity;
    private $startStreet;

    private $endCity;
    private $endStreet;

    private $extraRoad;
    private $maxSize;
    private $description;
    private $deadline;

    private $brand;
    private $model;
    private $year;
    private $registration;

    public function __construct(
        $startCity,
        $startStreet,
        $endCity,
        $endStreet,
        $extraRoad,
        $maxSize,
        $description,
        $deadline,
        $brand,
        $model,
        $year,
        $registration)
    {
        $this->startCity = $startCity;
        $this->startStreet = $startStreet;
        $this->endCity = $endCity;
        $this->endStreet = $endStreet;
        $this->extraRoad = $extraRoad;
        $this->maxSize = $maxSize;
        $this->description = $description;
        $this->deadline = $deadline;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->registration = $registration;
    }

    public function setDeadline(Date $deadline)
    {
        $this->deadline = $deadline;
    }

    public function setBrand(string $brand)
    {
        $this->brand = $brand;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function setYear(string $year)
    {
        $this->year = $year;
    }

    public function setRegistration(string $registration)
    {
        $this->registration = $registration;
    }

    public function setStartCity(string $startCity)
    {
        $this->startCity = $startCity;
    }

    public function setStartStreet(string $startStreet)
    {
        $this->startStreet = $startStreet;
    }

    public function setEndCity(string $endCity)
    {
        $this->endCity = $endCity;
    }

    public function setEndStreet(string $endStreet)
    {
        $this->endStreet = $endStreet;
    }

    public function setExtraRoad(float $extraRoad)
    {
        $this->extraRoad = $extraRoad;
    }

    public function setMaxSize(float $maxSize)
    {
        $this->maxSize = $maxSize;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }


    public function getDeadline(): string
    {
        return $this->deadline;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function getRegistration(): string
    {
        return $this->registration;
    }

    public function getStartCity(): string
    {
        return $this->startCity;
    }

    public function getStartStreet(): string
    {
        return $this->startStreet;
    }

    public function getEndCity(): string
    {
        return $this->endCity;
    }

    public function getEndStreet(): string
    {
        return $this->endStreet;
    }

    public function getExtraRoad(): int
    {
        return $this->extraRoad;
    }

    public function getMaxSize(): int
    {
        return $this->maxSize;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}