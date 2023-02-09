<?php
//3.16. В массиве А(N,M) расположить строки по убыванию значений максимальных элементов строк.

function sortRowsByDescendingOfMaxElements(array $array): array
{
    $N = count($array);
    $M = count($array[0]);
    $maxVector = [];
    for ($i = 0; $i < $N; $i++) {
        $max = $array[$i][0];
        for ($j = 0; $j < $M; $j++) {
            if ($max < $array[$i][$j]) {
                $max = $array[$i][$j];
            }
        }
        $maxVector[] = $max;
    }

    $iterations = $N - 1;
    for ($i = 0; $i < $N; $i++) {
        for ($j = 0; $j < $iterations; $j++) {
            if ($maxVector[$j] < $maxVector[$j + 1]) {
                $temp = $maxVector[$j];
                $maxVector[$j] = $maxVector[$j + 1];
                $maxVector[$j + 1] = $temp;

                $tempVector = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $tempVector;
            }
        }
        $iterations--;
    }

    return $array;
}

echo "<pre>";
print_r(sortRowsByDescendingOfMaxElements(array(
    [1, 2, 10],
    [1, 3, 30],
    [2, 50, 5],
    [40, 3, 5]
)));
