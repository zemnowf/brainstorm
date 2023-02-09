<?php
//3.18. Известно, что в каждой строке и каждом столбце массива А(N,N) имеется единственный
//отрицательный элемент. Переставить строки массива так, чтобы отрицательные элементы
//находились на главной диагонали.

function putNegativeElementsOnDiagonal(array $array)
{
    $N = count($array);
    $negativeIndexVector = [];
    for ($i = 0; $i < $N; $i++) {
        for ($j = 0; $j < $N; $j++) {
            if ($array[$i][$j] < 1) {
                $negativeIndexVector[] = $j;
            }
        }
    }

    $iterations = $N - 1;
    for ($i = 0; $i < $N; $i++) {
        for ($j = 0; $j < $iterations; $j++) {
            if ($negativeIndexVector[$j] > $negativeIndexVector[$j + 1]) {
                $temp = $negativeIndexVector[$j];
                $negativeIndexVector[$j] = $negativeIndexVector[$j + 1];
                $negativeIndexVector[$j + 1] = $temp;

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
print_r(putNegativeElementsOnDiagonal(array(
    [2, -1, 2, 2],
    [2, 2, -1, 2],
    [2, 2, 2, -1],
    [-1, 2, 2, 2]
)));