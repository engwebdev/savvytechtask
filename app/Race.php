<?php

namespace App;

class Race
{
    public array $players = [];
    public array $vehicleChoices = [];
    public array $countOfPlayer = [];
    public ?array $vehiclesDataFromJson;
    public \cli\Table $table;
    public array $vehicles;

    public function __construct()
    {
        $this->countOfPlayer = [1, 2];
        $JsonDecoder = new JsonDecoder();
        $this->vehiclesDataFromJson = $JsonDecoder->jsonFileRead(__DIR__ . '/../vehicles.json');
        $this->table = new \cli\Table;
    }

    public function run()
    {
        $this->setRaceData();
        $this->startGame($this->countOfPlayer);
        $result = $this->raceResult($this->players);
        $this->showResult($result);
    }

    private function setRaceData()
    {
        $this->table->setHeaders(['Vehicle Name', 'Max Speed', 'Unit']);
        $this->vehicles = [];
        foreach ($this->vehiclesDataFromJson as $key => $data) {
            // todo add to construct
            $vehicle = new Vehicle(
                $data['name'],
                $data['maxSpeed'],
                $data['unit'],
            );
            $vehicle->setSpeedKMH();
            $this->vehicles[] = $vehicle;
            $this->vehicleChoices[] = "{$data['name']}";
            $this->table->addRow([$data['name'], $data['maxSpeed'], $data['unit']]);
        }
    }

    private function startGame($countOfPlayer)
    {
        echo "******** game *********\n";
        echo "Welcome to Racing Game!\n";

        foreach ($countOfPlayer as $key => $value) {
            $this->players[$value] = new player();
            $name = $this->setPlayer($value);
            $this->players[$value]->setPlayerName($name);
            $this->table->display();
            $vehicle_row = $this->selectFromMenu($this->vehicleChoices, $this->players[$value]);
            $player_vehicle = $this->vehicles[$vehicle_row];
            $this->players[$value]->setPlayerVehicle($player_vehicle);
        }
    }

    private function raceResult($players): array
    {
        $result = [];
        foreach ($players as $key => $player) {
            $time = (1000 / (float) $player->Vehicle->speedWithKM);
            $result[$player->PlayerName] = $time;
        }
        asort($result);
        return $result;
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

    private function showResult($result)
    {
        $i = 1;
        echo "finally result is..... " . "\n";
        foreach ($result as $key => $row){
            echo "The " . $i . " person in the '" . $key . "' competition by getting the time of " . $row . " hours " . "\n";
            $i++;
        }
    }


}