<?php

namespace App;

class Race
{
    private array $players = [];

    public function __construct()
    {
//        $this->GeneratePlayersWithVehicles();
    }

    public function run()
    {
        $vehiclesDataFromJson = json_decode(file_get_contents(__DIR__.'/../vehicles.json'), true);
        $vehicles = [];
        $vehicleChoices = [];
        $table = new \cli\Table;
        $table->setHeaders(['Index', 'Vehicle Name', 'Max Speed', 'Unit']);
        foreach ($vehiclesDataFromJson as $key => $data) {
            $vehicle = new Vehicle(
                $data['name'],
                $data['maxSpeed'],
                $data['unit']
            );
            $vehicles[] = $vehicle;
            $table->addRow([$key, $data['name'], $data['maxSpeed'], $data['unit']]);
            $vehicleChoices[] = "{$data['name']}";
        }

        echo "******** game *********\n";
        echo "Welcome to Racing Game!\n";

        // p 1
        ////////////////////////////
        \cli\out("please enter first player 'name' :");
        $pleyer_one = \cli\input();
        $table->display();
        $select_player_1 = \cli\menu($vehicleChoices, null, "{$pleyer_one}, please select your vehicle:");
        echo "player " . $pleyer_one . " select " . $vehicles[$select_player_1]->name . "\n";

        // p 2
        ////////////////////////////
        \cli\out("please inter second player 'name':");
        $pleyer_two = \cli\input();
        $table->display();
        $select_player_2 = \cli\menu($vehicleChoices, null, "{$pleyer_one}, please select your vehicle:");
        echo "player " . $pleyer_two . " select " . $vehicles[$select_player_2]->name . "\n";

        ///////////////////////////
        if($vehicles[$select_player_2]->unit != 'Km/h'){
            $speed_2 = $vehicles[$select_player_2]->maxSpeed * 1.852;
            echo $speed_2 . " convert from " . $vehicles[$select_player_2]->unit . "\n";
        }else{
            $speed_2 = $vehicles[$select_player_2]->maxSpeed;
            echo $speed_2 . " from " . $vehicles[$select_player_2]->unit . "\n";
        }
        if($vehicles[$select_player_1]->unit != 'Km/h'){
            $speed_1 = $vehicles[$select_player_1]->maxSpeed * 1.851;
            echo $speed_1 . " convert from " . $vehicles[$select_player_1]->unit . "\n";
        }else{
            $speed_1 = $vehicles[$select_player_1]->maxSpeed;
            echo $speed_1 . " from " . $vehicles[$select_player_1]->unit . "\n";
        }

        ////////////////////////////
        echo "finally.... " . "\n";
        if ($speed_1 > $speed_2){
            echo "player " . $pleyer_one . " is winner!! " . "\n";
        }elseif ($speed_1 < $speed_2){
            echo "player " . $pleyer_two . " is winner!! " . "\n";
        }else{
            echo "we do not have winner! every player lost..... " . "\n";
        }
    }
}