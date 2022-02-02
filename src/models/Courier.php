<?php

class Courier {
    private $startName;
    private $startAlt;
    private $startLong;
    private $endName;
    private $endAlt;
    private $endLong;

    private $extraRoad;
    private $maxSize;
    private $description;
    private $deadline;

    private $brand;
    private $model;
    private $year;
    private $registration;
    private $creatorName;
    private $creatorSurname;

    public function __construct(
        $startName,
        $startAlt,
        $startLong,
        $endName,
        $endAlt,
        $endLong,
        $extraRoad,
        $maxSize,
        $description,
        $deadline,
        $brand,
        $model,
        $year,
        $registration,
        $creatorName,
        $creatorSurname)
    {
        $this->startName = $startName;
        $this->startAlt = $startAlt;
        $this->startLong = $startLong;
        $this->endName = $endName;
        $this->endAlt = $endAlt;
        $this->endLong = $endLong;
        $this->extraRoad = $extraRoad;
        $this->maxSize = $maxSize;
        $this->description = $description;
        $this->deadline = $deadline;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->registration = $registration;
        $this->creatorName = $creatorName;
        $this->creatorSurname = $creatorSurname;
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

    public function getStartName()
    {
        return $this->startName;
    }

    public function getStartAlt()
    {
        return $this->startAlt;
    }

    public function getStartLong()
    {
        return $this->startLong;
    }

    public function getEndName()
    {
        return $this->endName;
    }

    public function getEndAlt()
    {
        return $this->endAlt;
    }

    public function getEndLong()
    {
        return $this->endLong;
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

    public function getCreatorName(): string
    {
        return $this->creatorName;
    }

    public function getCreatorSurname(): string
    {
        return $this->creatorSurname;
    }




}
