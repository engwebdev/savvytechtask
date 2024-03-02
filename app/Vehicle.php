<?php
namespace App;
class Vehicle
{
    public string $name;
    public float $maxSpeed;
    public string $unit;

    public function __construct(string $name, float $maxSpeed, string $unit)
    {
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        $this->unit = $unit;
    }

}