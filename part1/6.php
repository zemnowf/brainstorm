<?php
//6. Найти наибольший общий делитель (НОД) двух натуральных чисел N и M, реализуя алгоритм
//эвклида.

function findNOD($N, $M)
{
    while ($N != 0 and $M != 0) {
        if ($N > $M) {
            $N = $N % $M;
        } else $M = $M % $N;
    }
    return $N + $M;
}

var_dump(findNOD(14, 35));
var_dump(findNOD(3, 14));