<?php
//string returns
echo CurrencyParser::getValueStr("29/09/2023", "R01235") . "<br>"; //return string "97,0018" aka DOLLAR USD ON 29/09/2023
echo CurrencyParser::getValueStr("28/01/2023", "R01239") . "<br>"; //return string "75,4062" aka EURO ON 28/01/2023

//float returns
echo CurrencyParser::getValueFloat("29/09/2023", "R01235") . "<br>"; //return float 97.0018 aka DOLLAR USD ON 29/09/2023

$date = new DateTime();
echo CurrencyParser::getValueFloat($date->format('d/m/Y'), "R01235") . "<br>"; //return float today DOLLAR USD currency

//give DateTime obj returns float
$date1 = new DateTime();
echo CurrencyParser::getValueFloatWithDate($date1, "R01239"); // return float today EURO currency

echo "<br>" . "<br>";
$date2 = new DateTime('2019-06-30 10:00:00');
echo CurrencyParser::getValueFloatWithDate($date2, "R01239"); // return float today EURO currency
echo "<br>" . "end";

class CurrencyParser
{
    const DOLLAR_CHAR = 'R01235';
    const EUR_CHAR = 'R01239';
    const SERBIAN_DINAR = 'R01805F';
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
    */

    public static function getValueStr($date, $charCode): string
    {
        $xml = simplexml_load_string(self::getXmlByCurl($date, $charCode));
        foreach ($xml as $record) {
            $value = strval($record->Value);
        }

        return $value ?? "1";
    }

    public static function getValueFloat($date, $charCode): float
    {
        $xmlStr = simplexml_load_string(self::getXmlByCurl($date, $charCode));
        foreach ($xmlStr as $record) {
            $value = floatval(str_replace(',', '.', strval($record->Value)));
        }

        return $value ?? 1;
    }

    public static function getValueFloatWithDate(DateTime $dateTime, $charCode): float
    {

        $date = $dateTime->format('d/m/Y');

        $xmlStr = simplexml_load_string(self::getXmlByCurl($date, $charCode));
        foreach ($xmlStr as $record) {
            $value = floatval(str_replace(',', '.', strval($record->Value)));
        }

        return $value ?? 1;
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

}
