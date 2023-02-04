<?php
//2. В массиве А(N,М) найти номер строки, среднее арифметическое положительных элементов
//которой является наименьшим.

function findLeastAverageOfPositiveElems(array $arr)
{
    $N = count($arr);
    $index = null;
    $average = null;
    for ($i = 0; $i < $N; $i++) {
        $sum = 0;
        $count = 0;
        $M = count($arr[$i]);
        for ($j = 0; $j < $M; $j++) {
            if ($arr[$i][$j] > 0) {
                $sum += $arr[$i][$j];
                $count++;
            }
        }
        if ($average) {
            if ($sum / $count < $average) {
                $average = $sum / $count;
                $index = $i;
            }
        } else {
            $average = $sum / $count;
            $index = $i;
        }
    }
    return $index + 1;
}

echo findLeastAverageOfPositiveElems(array(
    [1, -3, 2, 3, 6],
    [2, 2, -3, 2, 4],
    [-4, -4, 3, 3, 3]
)); // 4 2.5 3 - 2