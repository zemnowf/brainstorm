<?php

namespace ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser;

use DateTime;

class CBRDateFormatter
{

    public static function formatDate(DateTime $dateTime): string
    {
        return $dateTime->format('d/m/Y');
    }
}
