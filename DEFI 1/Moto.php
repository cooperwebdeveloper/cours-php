<?php

class Moto
{
    public string $brand;
    public string $color;
    public float $maxSpeed;

    public function __construct(string $brand, string $color, float $maxSpeed)
    {
        $this->brand = $brand;
        $this->color = $color;
        $this->maxSpeed = $maxSpeed;
    }

    public function getDescription(): string
    {
        return $this->brand.' '.$this->color.' ayant une vitesse maximale de '.$this->maxSpeed.'km/h'.PHP_EOL;
    }
}
