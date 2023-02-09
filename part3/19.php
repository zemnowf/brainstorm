<?php
//3.19. В массиве А(N,M) расположить элементы строк в порядке убывания. Вставить в каждую строку
//заданное число р, не нарушая этот порядок.

function insertNumberIntoRowAndSort(array $array, int $p): array
{
    //variant 1
//    $N = count($array);
//
//    for ($i = 0; $i < $N; $i++) {
//        $array[$i][] = $p;
//    }

    $N = count($array);
    $M = count($array[0]);

    for ($i = 0; $i < $N; $i++) {
        $iterations = $M - 1;
        for ($j = 0; $j < $M; $j++) {
            for ($k = 0; $k < $iterations; $k++) {
                if ($array[$i][$k] < $array[$i][$k + 1]) {
                    $temp = $array[$i][$k];
                    $array[$i][$k] = $array[$i][$k + 1];
                    $array[$i][$k + 1] = $temp;
                }
            }
            $iterations--;
        }
    }

    //variant 1
    //return $array;

    //variant 2
    $newArr = [];
    for ($i = 0; $i < $N; $i++) {
        $vector = [];
        for ($j = 0; $j < $M; $j++) {
            if ($j == 0 and $p > $array[$i][$j]) {
                $vector[] = $p;
                $vector[] = $array[$i][$j];
                continue;
            }
            if ($p <= $array[$i][$j] and $p > $array[$i][$j + 1]) {
                $vector[] = $array[$i][$j];
                $vector[] = $p;
                continue;
            }
            $vector[] = $array[$i][$j];
            if ($p <= $array[$i][$j] and $j == $M - 1) {
                $vector[] = $p;
            }
        }
        $newArr[] = $vector;
    }

    //variant 2
    return $newArr;
}

echo "<pre>";
print_r(insertNumberIntoRowAndSort(array(
    [1, 5, 3, 9],
    [2, 4, 6, 8],
    [3, 10, 5, 1],
    [4, 1, 2, 3]
), 5));