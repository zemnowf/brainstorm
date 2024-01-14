<?php

namespace ManaoDev\Lvlup\Solid\L\BadExample\SpaceObject;

class SatellitePrinter
{

    public static function printSatelliteNames(SpaceObject $spaceObject) {
        $satellitesNames = [];
        foreach ($spaceObject->getSatellites() as $satellite) {
            echo $satellite->getName();
        }
    }

}