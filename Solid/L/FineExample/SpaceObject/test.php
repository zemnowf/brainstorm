<?php
require("../../../../config.php");
use ManaoDev\Lvlup\Solid\L\FineExample\SpaceObject\SpaceObject;
use ManaoDev\Lvlup\Solid\L\FineExample\SpaceObject\Star;
use ManaoDev\Lvlup\Solid\L\FineExample\SpaceObject\Comet;
use ManaoDev\Lvlup\Solid\L\FineExample\SpaceObject\SatellitePrinter;

$moon = new SpaceObject('Moon', []);
$earth = new SpaceObject('Earth', [$moon]);
$sun = new Star('Sun', [$earth], 'yellow dwarf');

echo $sun->getName();
$nishimura = new Comet('Nishimura', [], '2');

SatellitePrinter::printSatelliteNames($sun);
SatellitePrinter::printSatelliteNames($nishimura);