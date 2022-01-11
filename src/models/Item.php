<?php

class Item {

    private $startCity;
    private $startStreet;
    private $startNumber;

    private $endCity;
    private $endStreet;
    private $endNumber;

    private $width;
    private $height;
    private $depth;

    private $name;
    private $type;
    private $payment;
    private $time;
    private $passengers;
    private $file;
    private $description;


    public function __construct(
        $startCity,
        $startStreet,
        $startNumber,
        $endCity,
        $endStreet,
        $endNumber,
        $width,
        $height,
        $depth,
        $name,
        $type,
        $payment,
        $time,
        $passengers,
        $file,
        $description)
    {
        $this->startCity = $startCity;
        $this->startStreet = $startStreet;
        $this->startNumber = $startNumber;
        $this->endCity = $endCity;
        $this->endStreet = $endStreet;
        $this->endNumber = $endNumber;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->name = $name;
        $this->type = $type;
        $this->payment = $payment;
        $this->time = $time;
        $this->passengers = $passengers;
        $this->file = $file;
        $this->description = $description;
    }


    public function getStartCity(): string
    {
        return $this->startCity;
    }

    public function getStartStreet(): string
    {
        return $this->startStreet;
    }

    public function getStartNumber(): string
    {
        return $this->startNumber;
    }

    public function getEndCity(): string
    {
        return $this->endCity;
    }

    public function getEndStreet(): string
    {
        return $this->endStreet;
    }

    public function getEndNumber(): string
    {
        return $this->endNumber;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPayment(): int
    {
        return $this->payment;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getPassengers(): int
    {
        return $this->passengers;
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function getDescription(): string
    {
        return $this->description;
    }



    public function setStartCity(string $startCity)
    {
        $this->startCity = $startCity;
    }

    public function setStartStreet(string $startStreet)
    {
        $this->startStreet = $startStreet;
    }

    public function setStartNumber(string $startNumber)
    {
        $this->startNumber = $startNumber;
    }

    public function setEndCity(string $endCity)
    {
        $this->endCity = $endCity;
    }

    public function setEndStreet(string $endStreet)
    {
        $this->endStreet = $endStreet;
    }

    public function setEndNumber(string $endNumber)
    {
        $this->endNumber = $endNumber;
    }

    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    public function setDepth(int $depth)
    {
        $this->depth = $depth;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function setPayment(int $payment)
    {
        $this->payment = $payment;
    }

    public function setTime(\Cassandra\Date $time)
    {
        $this->time = $time;
    }

    public function setPassengers(int $passengers)
    {
        $this->passengers = $passengers;
    }

    public function setFile(string  $file)
    {
        $this->file = $file;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }





}