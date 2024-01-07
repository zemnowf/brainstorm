<?php

namespace ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser;

use DateTime;
use ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser\CurrencyParserInterface\ICurrencyParser;
use ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser\CBRCurrencyMapper;
use ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser\CBRDateFormatter;
use ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser\CBRReqBuilder;
use ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser\CBRXmlRequester;
use ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser\CBRXmlParser;

class CBRCurrencyParser implements ICurrencyParser
{

    public function getCurrencyRate(DateTime $date, string $currency): float
    {
        $charValue = CBRCurrencyMapper::getCode($currency); // формируем валюту как надо запросу в цбр
        $dateValue = CBRDateFormatter::formatDate($date); // формируем дату как надо запросу в цбр

        $reqBuilder = new CBRReqBuilder();
        $request = $reqBuilder->getRequest($charValue, $dateValue); //формируем запрос как надо цбр

        $xmlRequester = new CBRXmlRequester();
        $xml = $xmlRequester->getXml($request); //получаем xml

        $xmlParser = new CBRXmlParser();
        $value = $xmlParser->getRate($xml); //получаем курс

        return $value;
    }

}
