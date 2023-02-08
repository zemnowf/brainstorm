<?php
//13. В массив А(N,М) вставить одномерный массив В(N), расположив его перед последним
//столбцом, содержащим нулевой элемент. Если такого столбца не окажется, то вставить массив
//В(N) после последнего столбца.

function insertVectorBeforeLastColumnWithZero(array $array, array $vector): array
{
    $N = count($array);
    $M = count($array[0]);
    $zeroElemJ = null;
    for ($j = 0; $j < $M; $j++) {
        for ($i = 0; $i < $N; $i++) {
            if ($array[$i][$j] == 0) {
                $zeroElemJ = $j;
            }
        }
    }

    $newArr = [];
    for ($j = 0; $j < $M; $j++) {
        if ($zeroElemJ) {
            if ($j == $zeroElemJ) {
                $newArr[] = $vector;
            }
        }
        $newVector = [];
        for ($i = 0; $i < $N; $i++) {
            $newVector[] = $array[$i][$j];
        }
        $newArr[] = $newVector;
    }

    if (!$zeroElemJ) {
        $newArr[] = $vector;
    }

    $transposedArray = [];
    for ($i = 0; $i < count($newArr[0]); $i++) {
        for ($j = 0; $j < count($newArr); $j++) {
            $transposedArray[$i][$j] = $newArr[$j][$i];
        }
    }

    return $transposedArray;

}

echo "<pre>";
print_r(insertVectorBeforeLastColumnWithZero(array(
    [0, 2, 2, 3],
    [1, 2, 0, 3],
    [1, 0, 2, 3]
), array(9, 9, 9)));