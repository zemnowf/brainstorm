<?php
//6. В матрице А(N,N) найти первую строку, не содержащую отрицательных элементов, и умножить
//ее как вектор на матрицу А

function MultiplyMatrixByFirstVectorWithoutNegativeElements(array $arr): array
{
    $N = count($arr);
    $isDesiredVector = false;
    $vector = [];

    for ($i = 0; $i < $N; $i++) {
        if (isWithoutNegativeVector($arr[$i])) {
            $vector = $arr[$i];
            break;
        }
    }

    for ($i = 0; $i < $N; $i++) {
        for ($j = 0; $j < $N; $j++) {
            $arr[$i][$j] *= $vector[$j];
        }
    }

    return $arr;
}

function isWithoutNegativeVector(array $vector): bool
{
    $N = count($vector);
    for ($i = 0; $i < $N; $i++) {
        if ($vector[$i] < 0) {
            return false;
        }
    }
    return true;
}

print_r(MultiplyMatrixByFirstVectorWithoutNegativeElements(array(
    [1, 3, -1, 3],
    [2, 4, -6, 8],
    [2, 4, 6, 8]
)));