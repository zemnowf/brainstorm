<?php

namespace ManaoDev\Lvlup\Solid\S\BadExample\CurrencyParser;

use DateTime;
/*
 * Класс
 * 1. Преобразовывает дату в нужный формат
 * 2. Формирует url запрос
 * 3. Посылает curl запрос
 */
class CurrencyParser
{
    const DOLLAR_CHAR = 'R01235';
    const EUR_CHAR = 'R01239';
    const SERBIAN_DINAR = 'R01805F';
    const CAD = 'R01350';
    const CBR_URL = "https://www.cbr.ru/scripts/XML_dynamic.asp?";
    const CBR_PARAM_DATE_FROM = 'date_req1=';
    const CBR_PARAM_DATE_TO = '&date_req2=';
    const CBR_PARAM_VAL_NM_RQ = "&VAL_NM_RQ=";

    /*
     * date format in url must be dd/mm/yyyy
     * charCode according to https://www.cbr.ru/scripts/XML_val.asp?d=0
     * USD: R01235
     * EURO: R01235
     * Serbian Dinar: R01805F
     * Canadian dollar: R01350
    */

    public static function getValueFloatWithDate(DateTime $dateTime, $currency): float
    {

        $charCode = self::getCode($currency);
        $date = $dateTime->format('d/m/Y');

        $xmlStr = simplexml_load_string(self::getXmlByCurl($date, $charCode));
        foreach ($xmlStr as $record) {
            $value = floatval(str_replace(',', '.', strval($record->Value)));
        }

        return $value ?? 0;
    }

    private static function getXmlByCurl($date, $charCode): bool|string
    {
        $curl = curl_init();
        $headers = [];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_POST, false); //
        curl_setopt($curl, CURLOPT_URL, self::getUrl($date, $charCode));

        return curl_exec($curl);
    }

    private static function getUrl($date, $charCode) : string
    {
        return self::CBR_URL . self::CBR_PARAM_DATE_FROM . $date . self::CBR_PARAM_DATE_TO . $date
            . self::CBR_PARAM_VAL_NM_RQ . $charCode;
    }

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
        }

        return self::DOLLAR_CHAR;
    }
}
