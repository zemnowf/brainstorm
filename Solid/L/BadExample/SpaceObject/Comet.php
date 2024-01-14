<?php

namespace ManaoDev\Lvlup\Solid\L\BadExample\SpaceObject;

class Comet extends SpaceObject
{
    private int $tailLength;

    public function __construct(string $name, array $satellites, int $tailLength)
    {
        parent::__construct($name, $satellites);
        $this->tailLength = $tailLength;
    }

    public function getTailLength(): int
    {
        return $this->tailLength;
    }

    public function getSatellites(): array
    {
        return "Comet can not have any satellite";
    }

}