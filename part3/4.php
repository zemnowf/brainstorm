<?php
//4. В массиве А(N,М) найти сумму тех элементов, в записи которых используются только цифры 0,
//1, 3, 8.

function getRowsWithElemsWithDigits(array $arr)
{
    $N = count($arr);
    $sum = 0;
    for ($i = 0; $i < $N; $i++) {
        $M = count($arr[$i]);
        for ($j = 0; $j < $M; $j++) {
            if (checkCondition($arr[$i][$j])) {
                echo $arr[$i][$j] . "; ";
                $sum += $arr[$i][$j];
            }
        }
    }
    return $sum;
}

function checkCondition($currentNumber): bool
{
    $number = $currentNumber;
    while ($number >= 1) {
        $digit = $number % 10;
        if ($digit !== 1 and $digit !== 3 and $digit !== 8 and $digit !== 0) {
            return false;
        }
        $number = (int)$number / 10;
    }
    return true;
}

print_r("sum: " . getRowsWithElemsWithDigits(array(
        [13, 88, 27], //13+88+
        [15, 21, 31], //31+
        [10, 25, 33],   //+10+33 == 175
    )));