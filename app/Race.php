<?php

namespace App;

class Race
{
    public array $players = [];
    public array $vehicleChoices = [];
    public array $countOfPlayer = [];

    public function __construct()
    {
        $this->countOfPlayer = [1 , 2];
    }

    public function run()
    {
        $JsonDecoder = new JsonDecoder(); // todo add to construct
        $vehiclesDataFromJson = $JsonDecoder->jsonFileRead(__DIR__ . '/../vehicles.json');
        ////////
        $table = new \cli\Table; // todo add to construct
        $table->setHeaders(['Vehicle Name', 'Max Speed', 'Unit']);
        $vehicles = [];
        foreach ($vehiclesDataFromJson as $key => $data) {
            // todo add to construct
            $vehicle = new Vehicle(
                $data['name'],
                $data['maxSpeed'],
                $data['unit'],
            );
            $vehicle->setSpeedKMH();
            $vehicles[] = $vehicle;
            $this->vehicleChoices[] = "{$data['name']}";
            $table->addRow([$data['name'], $data['maxSpeed'], $data['unit']]);
        }
        echo "******** game *********\n";
        echo "Welcome to Racing Game!\n";

        foreach ($this->countOfPlayer as $key => $value){
            $this->players[$value] = new player();
            $name = $this->setPlayer($value);
            $this->players[$value]->setPlayerName($name);
            $table->display();
            $vehicle_row = $this->selectFromMenu($this->vehicleChoices, $this->players[$value]);
            $player_vehicle = $vehicles[$vehicle_row];
            $this->players[$value]->setPlayerVehicle($player_vehicle);
        }


        var_dump($this->players);
        ///////////////////////////
//        if ($vehicles[$select_player_2]->unit != 'Km/h') {
//            $speed_2 = $vehicles[$select_player_2]->maxSpeed * 1.852;
//            echo $speed_2 . " convert from " . $vehicles[$select_player_2]->unit . "\n";
//        }
//        else {
//            $speed_2 = $vehicles[$select_player_2]->maxSpeed;
//            echo $speed_2 . " from " . $vehicles[$select_player_2]->unit . "\n";
//        }
//        if ($vehicles[$select_player_1]->unit != 'Km/h') {
//            $speed_1 = $vehicles[$select_player_1]->maxSpeed * 1.851;
//            echo $speed_1 . " convert from " . $vehicles[$select_player_1]->unit . "\n";
//        }
//        else {
//            $speed_1 = $vehicles[$select_player_1]->maxSpeed;
//            echo $speed_1 . " from " . $vehicles[$select_player_1]->unit . "\n";
//        }

        ////////////////////////////
        echo "finally.... " . "\n";
        if ($speed_1 > $speed_2) {
            echo "player " . $pleyer_one . " is winner!! " . "\n";
        }
        elseif ($speed_1 < $speed_2) {
            echo "player " . $pleyer_two . " is winner!! " . "\n";
        }
        else {
            echo "we do not have winner! every player lost..... " . "\n";
        }
    }

    public function raceResult($players)
    {


    }

    public function setPlayer($id): string
    {
        \cli\out("please enter " . $id . " player 'name' :");
        return \cli\input();
    }

    public function selectFromMenu($vehicleList, Player $player): string
    {
        $selected = \cli\menu($vehicleList, null, "{$player->PlayerName}, please select your vehicle:");
        echo "player " . $player->PlayerName . " select " . $vehicleList[$selected] . "\n";
        return $selected;
    }
}