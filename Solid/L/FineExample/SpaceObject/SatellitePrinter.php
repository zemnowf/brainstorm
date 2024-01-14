<?php

namespace ManaoDev\Lvlup\Solid\L\FineExample\SpaceObject;

class SatellitePrinter
{
    public static function printSatelliteNames(SpaceObject $spaceObject)
    {

        if (count($spaceObject->getSatellites())) {
            $satellitesNames = [];
            foreach ($spaceObject->getSatellites() as $satellite) {
                echo $satellite->getName();
            }
        } else {
            echo $spaceObject->getName() . ' has no satellites';
        }
    }

}