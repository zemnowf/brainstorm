<?php
//5. В массиве А(N,М) найти сумму элементов тех столбцов, все элементы которых кратны
//заданному числу р .

function findSumOfColumnsWithNumbersMultipleOfVariable(array $arr, int $p)
{
    $M = count($arr[0]);
    $N = count($arr);
    for ($j = 0; $j < $M; $j++) {
        $isMultiple = true;
        $sum = 0;
        for ($i = 0; $i < $N; $i++) {
            if ($arr[$i][$j] % $p !== 0) {
                $isMultiple = false;
                break;
            }
        }
        if ($isMultiple) {
            for ($i = 0; $i < $N; $i++) {
                $sum += $arr[$i][$j];
            }
            echo "Сумма элементов столбца " . ($j + 1) . " - $sum <br>";
        } else {
            echo "Некоторые элементы столбца " . ($j + 1) . " не кратны $p <br>";
        }
    }
}

findSumOfColumnsWithNumbersMultipleOfVariable(array(
    [1, 3, 4, 20],
    [8, 4, 12, 20],
    [4, 20, 5, 32],
    [4, 16, 80, 100]
), 4);