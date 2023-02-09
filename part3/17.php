<?php
//В массиве А(N,M) элементы, кратные заданному числу р, переместить в начало строк и
//расположить их в порядке возрастания.

function sortMultipleNumbersInRows(array $array, int $p): array
{
    $N = count($array);
    $M = count($array[0]);
    $newArr = [];
    for ($i = 0; $i < $N; $i++) {
        $vector = [];
        for ($j = 0; $j < $M; $j++) {
            if ($array[$i][$j] % $p == 0) {
                $vector[] = $array[$i][$j];
            }
        }

        $vectorSize = count($vector);
        $iterations = $vectorSize - 1;

        for ($x = 0; $x < $N; $x++) {
            for ($y = 0; $y < $iterations; $y++) {
                if ($vector[$y] > $vector[$y + 1]) {
                    $temp = $vector[$y];
                    $vector[$y] = $vector[$y + 1];
                    $vector[$y + 1] = $temp;
                }
            }
            $iterations--;
        }

        for ($j = 0; $j < $M; $j++) {
            if ($array[$i][$j] % $p != 0) {
                $vector[] = $array[$i][$j];
            }
        }
        $newArr[] = $vector;
    }
    return $newArr;
}

echo "<pre>";
print_r(sortMultipleNumbersInRows(array(
    [5, 6, 12, 4],
    [9, 3, 15, 7],
    [21, 15, 8, 9]
), 3));