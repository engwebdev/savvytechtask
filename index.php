<?php

use App\Vehicle;
use App\Race\Race;

require_once __DIR__ . '/vendor/autoload.php';
$game = new Race();
$game->run();
