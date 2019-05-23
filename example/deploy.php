<?php

use Taniko\Nao\Seed\Beacon;
use Taniko\Nao\Seed\Blinker;
use Taniko\Nao\Seed\Clock;
use Taniko\Nao\Seed\Pulsar;
use Taniko\Nao\Universe;

require __DIR__.'/../vendor/autoload.php';

$universe = new Universe(40, 40);
$universe->deployCells(5, 5, new Pulsar());
$universe->deployCells(5, 20, new Blinker());
$universe->deployCells(15, 20, new Beacon());
$universe->deployCells(25, 20, new Clock());
for ($i = 0; $i < 100; $i++) {
    $universe->evolve();
    system('clear');
    print "step {$i}\n";
    print $universe;
    usleep(200000);
}