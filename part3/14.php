<?php
//3.14. В массиве А(N,М) строку с максимальным количеством
// знакочередующихся элементов переставить на первое место

function replaceMaxAlternatingRow(array $array)
{
    $N = count($array);
    $M = count($array[0]);
    $maxCounter = 0;
    $maxI = 0;
    for ($i = 0; $i < $N; $i++) {
        $counter = 0;
        for ($j = 0; $j < $M - 1; $j++) {
            if ($array[$i][$j] < 0 and $array[$i][$j + 1] > 0) {
                $counter++;
            }
            if ($array[$i][$j] > 0 and $array[$i][$j + 1] < 0) {
                $counter++;
            }
        }
        if ($maxCounter < $counter) {
            $maxCounter = $counter;
            $maxI = $i;
        }
    }

    $newArr = [];
    $newArr[] = $array[$maxI];
    for ($i = 0; $i < $N; $i++) {
        $newVector = [];
        if ($i == $maxI) {
            continue;
        }
        for ($j = 0; $j < $M; $j++) {
            $newVector[] = $array[$i][$j];
        }
        $newArr[] = $newVector;
    }

    return $newArr;
}

echo "<pre>";
print_r(replaceMaxAlternatingRow(array(
    [1, 1, 1, 1],
    [2, -2, 2, -2],
    [3, -3, 3, -3],
    [4, 4, 4, 4]
)));