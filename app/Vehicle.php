<?php
namespace App;
class Vehicle
{
    public string $name;
    public float $maxSpeed;
    public string $unit;
    public string $speedWithKM;

    public function __construct(string $name, float $maxSpeed, string $unit)
    {
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        $this->unit = $unit;
        $this->setSpeedKMH();
    }

    public function setSpeedKMH()
    {
        switch (strtolower($this->unit)) {
            case 'km/h':
                $this->speedWithKM = $this->maxSpeed;
                break;
            case 'kts':
            case 'knots':
                $this->speedWithKM = $this->maxSpeed * 1.852;
                break;
            default:
                throw new \InvalidArgumentException("unknown speed unit: $this->unit");
        }
    }

}