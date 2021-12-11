<?php

class Delivery {
    private $startCity;
    private $endCity;
    private $extraRoad;
    private $maxSize;
    private $description;

    public function __construct(
        string $startCity,
        string $endCity,
        float $extraRoad,
        float $maxSize,
        string $description
    ) {
        $this->startCity = $startCity;
        $this->endCity = $endCity;
        $this->extraRoad = $extraRoad;
        $this->maxSize = $maxSize;
        $this->description = $description;
    }

    public function setStartCity(string $startCity)
    {
        $this->startCity = $startCity;
    }

    public function setEndCity(string $endCity)
    {
        $this->endCity = $endCity;
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

    public function getStartCity(): string
    {
        return $this->startCity;
    }

    public function getEndCity(): string
    {
        return $this->endCity;
    }

    public function getExtraRoad(): float
    {
        return $this->extraRoad;
    }

    public function getMaxSize(): float
    {
        return $this->maxSize;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}