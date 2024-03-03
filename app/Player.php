<?php

namespace App;

class Player
{
    public string $PlayerName;
    public Vehicle $Vehicle;
    public float $VehicleSpeedByKMH;

    public function __construct()
    {
    }

    public function setPlayerName(string $playerName)
    {
        $this->PlayerName = $playerName;
    }

    public function setPlayerVehicle(Vehicle $vehicle)
    {
        $this->Vehicle = $vehicle;
    }

    public function getPlayerVehicle(): Vehicle
    {
        return $this->Vehicle;
    }

    private function vehicleSpeedByKMH(): string
    {
        $this->Vehicle->speed();
        return 0;
    }

}