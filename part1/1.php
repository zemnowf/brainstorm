<?php
//1. Определить количество цифр, меньших 5, используемых при записи натурального числа N

$number = 88553300;

function getDigitsLessThanFive($number)
{
    $counter = 0;
    while ($number > 1) {
        $digit = $number % 10;
        if ($digit < 5) {
            $counter++;
        }
        $number = (int)$number / 10;
    }
    return $counter;
}

echo getDigitsLessThanFive($number);