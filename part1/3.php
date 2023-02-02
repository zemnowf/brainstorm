<?php
//3. Найти все четные четырехзначные числа, цифры которых следуют в порядке возрастания или
//убывания.

function getAllSequenceNumbers(){
    for ($number = 1000; $number < 10000; $number++){
//        if (getIfAscending($number) || getIfDescending($number)){
//            echo $number . "<br>";
//        }
        if (getIfDescending($number)){
            echo $number . " descending <br>";
        }
        if (getIfAscending($number)){
            echo $number . " ascending <br>";
        }
    }
}

function getIfAscending($number)
{
    while ($number > 1) {
        $currentDigit = $number % 10;
        $number = (int)($number / 10);
        $prevDigit = $number % 10;
        if ($currentDigit <= $prevDigit) {
            return false;
        }
    }
    return true;
}

function getIfDescending($number)
{
    $currentDigit = $number % 10;
    $number = (int)($number / 10);
    $prevDigit = $number % 10;

    while ($number > 0) {
        if ($currentDigit >= $prevDigit) {
            return false;
        }
        $currentDigit = $prevDigit;
        $number = (int)($number / 10);
        $prevDigit = $number % 10;
    }
    return true;
}

getAllSequenceNumbers();