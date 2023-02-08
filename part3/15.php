<?php
//В массиве А(N,М) столбец с минимальным количеством нечетных элементов переставить на последнее место.

function replaceMinOddColumn(array $array): array
{
    $N = count($array);
    $M = count($array[0]);
    $minCounter = $M + 1;
    $minJ = 0;
    for ($j = 0; $j < $M; $j++) {
        $counter = 0;
        for ($i = 0; $i < $N; $i++) {
            if ($array[$i][$j] % 2 == 1 and $array[$i][$j] != 1) {
                $counter++;
            }
        }
        if ($minCounter > $counter) {
            $minCounter = $counter;
            $minJ = $j;
        }
    }

    $newArr = [];
    for ($j = 0; $j < $M; $j++) {
        $newVector = [];
        if ($j == $minJ) {
            continue;
        }
        for ($i = 0; $i < $N; $i++) {
            $newVector[] = $array[$i][$j];
        }
        $newArr[] = $newVector;
    }

    $newVector = [];
    for ($i = 0; $i < $N; $i++) {
        $newVector[] = $array[$i][$minJ];
    }
    $newArr[] = $newVector;

    $transposedArray = [];
    for ($i = 0; $i < count($newArr[0]); $i++) {
        for ($j = 0; $j < count($newArr); $j++) {
            $transposedArray[$i][$j] = $newArr[$j][$i];
        }
    }

    return $transposedArray;

}

echo "<pre>";
print_r(replaceMinOddColumn(array(
    [3, 2, 5, 4],
    [2, 4, 3, 7],
    [5, 6, 1, 3]
)));