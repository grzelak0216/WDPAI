<?php

class Item {
    private $startName;
    private $startAlt;
    private $startLong;
    private $endName;
    private $endAlt;
    private $endLong;

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
    private $creatorName;
    private $creatorSurname;
    private $creatorID;
    private $id;


    public function __construct(
        $startName,
        $startAlt,
        $startLong,
        $endName,
        $endAlt,
        $endLong,
        $width,
        $height,
        $depth,
        $name,
        $type,
        $payment,
        $time,
        $passengers,
        $file,
        $description,
        $creatorName,
        $creatorSurname,
        $creatorID,
        $id = null)

    {
        $this->startName = $startName;
        $this->startAlt = $startAlt;
        $this->startLong = $startLong;
        $this->endName = $endName;
        $this->endAlt = $endAlt;
        $this->endLong = $endLong;
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
        $this->creatorName = $creatorName;
        $this->creatorSurname = $creatorSurname;
        $this->id = $id;
        $this->creatorID = $creatorID;
    }

    public function getCreatorID()
    {
        return $this->creatorID;
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

    public function getNameItem(): string
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

    public function getId(): int
    {
        return $this->id;
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