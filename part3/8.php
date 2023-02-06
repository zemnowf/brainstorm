<?php
//8. В каждой строке массива А(N,М) удалить все четные положительные элементы, стоящие
//между первым и последним максимальными элементами.

function popEvenPositiveElementsBetweenMaxes(array $arr): array
{
    $N = count($arr);
    $newArr = [];
    for ($i = 0; $i < $N; $i++) {
        $vector = [];
        $M = count($arr[$i]);
        $firstMax = $arr[$i][0];
        $firstMaxJ = 0;
        for ($j = 0; $j < $M; $j++) {
            if ($firstMax <= $arr[$i][$j]) {
                $firstMax = $arr[$i][$j];
                $firstMaxJ = $j;
            }
        }
        $lastMax = $arr[$i][0];
        $lastMaxJ = 0;
        for ($j = 0; $j < $M; $j++) {
            if ($j == $firstMaxJ) {
                $lastMax = $arr[$i][$j + 1];
                $lastMaxJ = $j + 1;
                continue;
            }
            if ($lastMax <= $arr[$i][$j]) {
                $lastMax = $arr[$i][$j];
                $lastMaxJ = $j;
            }
        }
        if ($firstMaxJ > $lastMaxJ) {
            $temp = $firstMaxJ;
            $firstMaxJ = $lastMaxJ;
            $lastMaxJ = $temp;
        }
        for ($j = 0; $j < $M; $j++) {
            if ($j > $firstMaxJ and $j < $lastMaxJ and $arr[$i][$j] > 0 and $arr[$i][$j] % 2 == 0) {
                continue;
            }
            $vector[] = $arr[$i][$j];
        }
        $newArr[] = $vector;
    }
    return $newArr;
}

echo "<pre>";
print_r(popEvenPositiveElementsBetweenMaxes(array(
    [1, 5, 3, -1, 2, 4, 2], // 1 5 3 -1 4 2
    [15, 7, 9, -10, 4, 5, 10, 1, 2], // 15 7 9 -10 5 10 1 2
    [1, 12, 4, 9, 10] // 1 12 9 10
)));
