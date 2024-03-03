<?php

namespace App;

class Player
{
    public string $PlayerName;
    public string $VehicleName;
    public float $VehicleSpeed;
    public string $VehicleUnit;
    public float $VehicleSpeedByKMH;

    public function __construct(
        string $playerName,
        string $vehicleName,
        float  $vehicleSpeed,
        string $vehicleUnit
    )
    {
        $this->PlayerName = $playerName;
        $this->VehicleName = $vehicleName;
        $this->VehicleSpeed = $vehicleSpeed;
        $this->VehicleUnit = $vehicleUnit;
        $this->VehicleSpeedByKMH = $this->speedConvertor($vehicleSpeed);
    }

    private function speedConvertor(float $vehicleSpeed): float
    {
        return 0;
    }

}