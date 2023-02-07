<?php
//11. В массиве А(N,М) удалить нулевые строки.

function removeZeroRows(array $arr): array
{
    $N = count($arr);
    $M = count($arr[0]);
    $newArr = [];
    for ($i = 0; $i < $N; $i++) {
        $ifNoneZero = null;
        $newVector = [];
        for ($j = 0; $j < $M; $j++) {
            if ($arr[$i][$j] != 0) {
                $ifNoneZero = true;
                break;
            }
        }
        if ($ifNoneZero) {
            for ($j = 0; $j < $M; $j++) {
                $newVector[] = $arr[$i][$j];
            }
            $newArr[] = $newVector;
        }
    }
    return $newArr;
}

echo "<pre>";
print_r(removeZeroRows(array(
    [1, 0, 1, 2, 0],
    [0, 1, 0, 2, 0],
    [0, 0, 0, 0, 0],
    [1, 1, 1, 1, 1],
    [0, 0, 0, 0, 0]
)));
