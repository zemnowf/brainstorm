<?php
require("../../../../config.php");

use ManaoDev\Lvlup\Solid\S\FineExample\CurrencyParser\CBRCurrencyParser;

$currencyParser = new CBRCurrencyParser();
$dateTest = new DateTime('2023-08-25');
echo $currencyParser->getCurrencyRate($dateTest, 'USD');