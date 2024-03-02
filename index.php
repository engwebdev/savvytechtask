<?php


use App\Vehicle;

require_once __DIR__ . '/vendor/autoload.php';



$vehiclesData = json_decode(file_get_contents(__DIR__.'/vehicles.json'), true);
$vehicles = [];


echo "******** game *********\n";
echo "Welcome to Racing Game!\n";

$table = new cli\Table;
$table->setHeaders(['Index', 'Vehicle Name', 'Max Speed', 'Unit']);
foreach ($vehiclesData as $index => $vehicle) {
    $table->addRow([$index, $vehicle['name'], $vehicle['maxSpeed'], $vehicle['unit']]);
}
$table->display();
cli\out("please inter first player 'name':");
$pleyer_one = cli\input();
cli\out("please inter second player 'name':");
$pleyer_two = cli\input();

$vehicleChoices = [];
foreach ($vehiclesData as $vehicle) {
    $vehicleChoices[] = "{$vehicle['name']}";
}


foreach ($vehiclesData as $data) {
    $vehicle = new Vehicle(
        $data['name'],
        $data['maxSpeed'],
        $data['unit']
    );
    $vehicles[] = $vehicle;
}

$select_player_1 = \cli\menu($vehicleChoices, null, "{$pleyer_one}, please choose your vehicle:");
$select_player_2 = \cli\menu($vehicleChoices, null, "{$pleyer_one}, please choose your vehicle:");
echo "player " . $pleyer_one . " select " . $vehicles[$select_player_1]->name . "\n";
echo "player " . $pleyer_two . " select " . $vehicles[$select_player_2]->name . "\n";
