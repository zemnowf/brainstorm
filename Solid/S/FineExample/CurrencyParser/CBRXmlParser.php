<?php

namespace ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser;

class CBRXmlParser
{

    public function getRate($xml): float
    {
        $xmlStr = simplexml_load_string($xml);
        foreach ($xmlStr as $record) {
            $value = floatval(str_replace(',', '.', strval($record->Value)));
        }

        return $value ?? 0;
    }
}