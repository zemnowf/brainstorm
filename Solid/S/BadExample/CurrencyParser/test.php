<?php
require("../../../../config.php");

use ManaoDev\Lvlup\Solid\S\BadExample\CurrencyParser\CurrencyParser;

$dateTest = new DateTime('2023-08-23');
echo CurrencyParser::getValueFloatWithDate($dateTest, "USD"); // return float 2023-08-23 EURO currency