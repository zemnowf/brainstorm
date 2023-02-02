<?php
//4. Получить все четырехзначные числа, в записи которых встречаются только цифры 0,2,3,7. Тут
//речь идёт про числа, где встречается только данный набор цифр, без повторений, т.е. 2037 -
//верно, 2000 - не верно


function getNumbersWithDigits()
{
    for ($currentNumber = 2037; $currentNumber < 10000; $currentNumber++) {
        checkCondition($currentNumber);
    }
}

function checkCondition($currentNumber){
    $number = $currentNumber;
    $d4 = $number % 10;
    if ($d4 == 2 || $d4 == 3 || $d4 == 7 || $d4 == 0) {
        $number = (int)($number / 10);
        $d3 = $number % 10;
        if ($d3 !== $d4 and $d3 == 2 || $d3 == 3 || $d3 == 7 || $d3 == 0) {
            $number = (int)($number / 10);
            $d2 = $number % 10;
            if ($d2 !== $d3 and $d2 !== $d4 and $d2 == 2 || $d2 == 3 || $d2 == 7 || $d2 == 0) {
                $number = (int)($number / 10);
                $d1 = $number;
                if ($d1 !== $d2 and $d1 !== $d3 and $d1 !== $d4 and $d1 == 2 || $d1 == 3 || $d1 == 7){
                    echo $currentNumber . "<br>";
                }
            }
        }
    }
}

getNumbersWithDigits();