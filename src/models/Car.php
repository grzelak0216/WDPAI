<?php

class Car {
    private $brand;
    private $model;
    private $type;
    private $year;
    private $color;
    private $generation;
    private $registration_number;
    private $combustion;

    public function __construct(
        string $brand,
        string $model,
        string $type,
        string $year,
        string $color,
        string $generation,
        string $registration_number,
        string $combustion
    ) {
        $this->brand = $brand;
        $this->model = $model;
        $this->type = $type;
        $this->year = $year;
        $this->color = $color;
        $this->generation = $generation;
        $this->registration_number = $registration_number;
        $this->combustion = $combustion;
    }

    public function setBrand(string $brand)
    {
        $this->brand = $brand;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }
    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function setYear(string $year)
    {
        $this->year = $year;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function setGeneration(string $generation)
    {
        $this->generation = $generation;
    }

    public function setRegistration_number(string $registration_number)
    {
        $this->registration_number = $registration_number;
    }

    public function setCombustion(string $combustion)
    {
        $this->combustion = $combustion;
    }

   
    public function getBrand(): string 
    {
        return $this->brand;
    }

    public function getModel(): string 
    {
        return $this->model;
    }

    public function getType(): string 
    {
        return $this->type;
    }

    public function getYear(): string 
    {
        return $this->year;
    }

    public function getColor(): string 
    {
        return $this->color;
    }

    public function getGeneration(): string 
    {
        return $this->generation;
    }

    public function getRegistration_number(): string 
    {
        return $this->registration_number;
    }

    public function getCombustion(): string 
    {
        return $this->combustion;
    }
}