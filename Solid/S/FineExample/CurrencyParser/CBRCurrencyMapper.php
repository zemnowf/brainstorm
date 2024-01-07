<?php

namespace ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser;

class CBRCurrencyMapper
{

    const DOLLAR_CHAR = 'R01235';
    const EUR_CHAR = 'R01239';
    const SERBIAN_DINAR = 'R01805F';
    const CAD = 'R01350';

    public static function getCode($code): string
    {
        switch ($code)
        {
            case 'USD':
                return self::DOLLAR_CHAR;
                break;
            case 'EUR':
                return self::EUR_CHAR;
                break;
            case 'RSD':
                return self::SERBIAN_DINAR;
                break;
            case 'CAD':
                return self::CAD;
                break;
            default :
                return self::DOLLAR_CHAR;
        }

    }
}