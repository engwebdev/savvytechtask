<?php

namespace App\Player;

use App\Vehicle\Vehicle;

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
}