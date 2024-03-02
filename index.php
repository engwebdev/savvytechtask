<?php


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

