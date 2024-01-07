<?php

namespace ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser;

class CBRReqBuilder
{
    const CBR_URL = "https://www.cbr.ru/scripts/XML_dynamic.asp?";
    const CBR_PARAM_DATE_FROM = 'date_req1=';
    const CBR_PARAM_DATE_TO = '&date_req2=';
    const CBR_PARAM_VAL_NM_RQ = "&VAL_NM_RQ=";

    private string $request;

    public function getRequest($charValue, $dateValue): string
    {
        return self::CBR_URL . self::CBR_PARAM_DATE_FROM . $dateValue . self::CBR_PARAM_DATE_TO . $dateValue
            . self::CBR_PARAM_VAL_NM_RQ . $charValue;
    }
}