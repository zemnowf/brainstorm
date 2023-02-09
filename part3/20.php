<?php
//3.20. В массиве А(N,M) переставить строки так, чтобы строка с максимальной суммой элементов
//стала первой строкой, а остальные строки расположить в порядке возрастания элементов
//первого столбца.

function putMaxSumOnFirstRowAndSortRestByFirstElement(array $array): array
{
    $N = count($array);
    $M = count($array[0]);
    $maxSum = 0;
    $maxSumI = 0;
    for ($i = 0; $i < $N; $i++) {
        $sum = 0;
        for ($j = 0; $j < $M; $j++) {
            $sum += $array[$i][$j];
        }
        if ($maxSum < $sum) {
            $maxSum = $sum;
            $maxSumI = $i;
        }
    }

    $restArray = [];
    $firstElemVector = [];
    for ($i = 0; $i < $N; $i++) {
        if ($i == $maxSumI) {
            continue;
        }
        $firstElemVector[] = $array[$i][0];
        $restArray[] = $array[$i];
    }

    $firstElemVectorSize = count($firstElemVector);
    $iterations = $firstElemVectorSize - 1;
    for ($i = 0; $i < $firstElemVectorSize; $i++) {
        for ($j = 0; $j < $iterations; $j++) {
            if ($firstElemVector[$j] > $firstElemVector[$j + 1]) {
                $temp = $firstElemVector[$j];
                $firstElemVector[$j] = $firstElemVector[$j + 1];
                $firstElemVector[$j + 1] = $temp;

                $tempVector = $restArray[$j];
                $restArray[$j] = $restArray[$j + 1];
                $restArray[$j + 1] = $tempVector;
            }
        }
        $iterations--;
    }


    $newArray = [$array[$maxSumI]];
    for ($i = 0; $i < $firstElemVectorSize; $i++) {
        $newArray[] = $restArray[$i];
    }

    return $newArray;
}

echo "<pre>";
print_r(putMaxSumOnFirstRowAndSortRestByFirstElement(array(
    [1, 5, 9, 12],
    [3, 4, 2, 7],
    [18, 100, 3, 9],
    [2, 12, 19, 30]
)));