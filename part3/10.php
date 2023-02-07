<?php
//10. В массиве А(N,М) поменять местами столбцы, содержащие максимальный и минимальный
//элементы.

function replaceMaxMinColumns(array $arr)
{
    $N = count($arr);
    $M = count($arr[0]);
    $max = $arr[0][0];
    $min = $arr[0][0];
    $maxJ = 0;
    $minJ = 0;

    for ($i = 0; $i < $N; $i++) {
        for ($j = 0; $j < $M; $j++) {
            if ($max < $arr[$i][$j]) {
                $max = $arr[$i][$j];
                $maxJ = $j;
            }
            if ($min > $arr[$i][$j]) {
                $min = $arr[$i][$j];
                $minJ = $j;
            }
        }
    }


    echo "max el $max index: $maxJ <br> min el $min index: $minJ <br>";

    $maxVector = [];
    for ($i = 0; $i < $N; $i++) {
        $maxVector[] = $arr[$i][$maxJ];
    }

    $minVector = [];
    for ($i = 0; $i < $N; $i++) {
        $minVector[] = $arr[$i][$minJ];
    }

    $newArr = [];
    for ($j = 0; $j < $M; $j++) {
        $newVector = [];
        if ($j == $maxJ) {
            $newVector = $minVector;
        } elseif ($j == $minJ) {
            $newVector = $maxVector;
        } else {
            for ($i = 0; $i < $N; $i++) {
                $newVector[] = $arr[$i][$j];
            }
        }
        $newArr[] = $newVector;
    }

    $transposedArray = [];
    for ($i = 0; $i < count($newArr[0]); $i++) {
        for ($j = 0; $j < $N; $j++) {
            $transposedArray[$i][$j] = $newArr[$j][$i];
        }
    }

    echo "<pre>";
    print_r($transposedArray);
}

replaceMaxMinColumns(array(
    [3, 5, 4],
    [2, 2, 9],
    [1, 3, 2]
));