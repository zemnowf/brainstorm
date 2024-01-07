<?php

namespace ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser;

class CBRXmlRequester
{

    public function getXml(string $request): string
    {
        $curl = curl_init();
        $headers = [];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_POST, false); //
        curl_setopt($curl, CURLOPT_URL, $request);

        return curl_exec($curl);
    }
}