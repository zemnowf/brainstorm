<?php
//2. Выяснить, образуют ли цифры данного натурального числа N возрастающую
//последовательность

function getIfAscending($number)
{
    while ($number > 1) {
        $currentDigit = $number % 10;
        $number = (int)($number / 10);
        $prevDigit = $number % 10;
        if ($currentDigit < $prevDigit) {
            return false;
        }
    }
    return true;
}

$ascendingNumber = 112359;
$noneAscendingNumber = 11325;
var_dump(getIfAscending($ascendingNumber));
var_dump(getIfAscending($noneAscendingNumber));