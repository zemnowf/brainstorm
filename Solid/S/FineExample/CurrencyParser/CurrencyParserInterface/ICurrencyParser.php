<?php

namespace ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser\CurrencyParserInterface;

use DateTime;

interface ICurrencyParser
{
    public function getCurrencyRate(DateTime $date, string $currency): float;
}