<?php
require("../../../../config.php");
use ManaoDev\Lvlup\Solid\L\BadExample\SpaceObject\SpaceObject;
use ManaoDev\Lvlup\Solid\L\BadExample\SpaceObject\Star;
use ManaoDev\Lvlup\Solid\L\BadExample\SpaceObject\Comet;
use ManaoDev\Lvlup\Solid\L\BadExample\SpaceObject\SatellitePrinter;

$moon = new SpaceObject('Moon', []);
$earth = new SpaceObject('Earth', [$moon]);
$sun = new Star('Sun', [$earth], 'yellow dwarf');

echo $sun->getName();
$nishimura = new Comet('Nishimura', [], '2');

SatellitePrinter::printSatelliteNames($sun);
SatellitePrinter::printSatelliteNames($nishimura);