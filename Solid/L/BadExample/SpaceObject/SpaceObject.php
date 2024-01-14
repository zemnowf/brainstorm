<?php

namespace ManaoDev\Lvlup\Solid\L\BadExample\SpaceObject;

class SpaceObject
{
    private string $name;
    private array $satellites;

    public function __construct(string $name, array $satellites)
    {
        $this->name = $name;
        $this->satellites = $satellites;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSatellites(): array
    {
        return $this->satellites;
    }

}