<?php

namespace ManaoDev\Lvlup\Solid\L\BadExample\SpaceObject;

class Star extends SpaceObject
{
    private string $starType;

    public function __construct(string $name, array $satellites, string $starType)
    {
        parent::__construct($name, $satellites);
        $this->starType = $starType;
    }

    public function getStarType(): string
    {
        return $this->starType;
    }

}