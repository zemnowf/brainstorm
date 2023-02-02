<?php
//1. Определить количество цифр, меньших 5, используемых при записи натурального числа N

$number = 88553300;

function getDigitsLessThanFive($number){
    for ($i = 0, $counter = 0; $number > 1; $i++){
        $digit = $number % 10;
        if($digit < 5){
            $counter++;
        }
        $number = (int)$number/10;
    }
    return $counter;
}

echo getDigitsLessThanFive($number);