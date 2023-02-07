<?php
//9. В массив А(N,М) после первого отрицательного элемента каждого столбца вставить число,
//равное минимальному элементу этого столбца. Если столбец не содержит отрицательных
//элементов, то вставить это число перед первым элементом столбца.

function insertMinAfterFirstNegativeInColumn(array $array): array
{
    $N = count($array);
    $M = count($array[0]);
    $newArr = [];
    for ($j = 0; $j < $M; $j++) {
        $ifNegative = null;
        $negativeI = 0;
        for ($i = 0; $i < $N; $i++) {
            if ($array[$i][$j] < 0) {
                $ifNegative = true;
                $negativeI = $i;
                break;
            }
        }
        $min = $array[0][$j];
        for ($i = 1; $i < $N; $i++) {
            if ($min > $array[$i][$j]) {
                $min = $array[$i][$j];
            }
        }
        $newVector = [];

        for ($i = 0; $i < $N; $i++) {
            if ($ifNegative) {
                if ($i == ($negativeI + 1)) {
                    $newVector[] = $min;
                }
            } elseif ($i == 0) {
                $newVector[] = $min;
            }
            $newVector[] = $array[$i][$j];
        }
        $newArr[] = $newVector;
    }

    $transposedArray = [];
    for ($i = 0; $i < count($newArr[0]); $i++) {
        for ($j = 0; $j < $N; $j++) {
            $transposedArray[$i][$j] = $newArr[$j][$i];
        }
    }

    return $transposedArray;
}

echo "<pre>";
print_r(insertMinAfterFirstNegativeInColumn(array(
    [2, 2, 2, 2, 2],
    [2, 2, 2, 2, 2],
    [-3, 3, 3, 3, 3],
    [-9, 1, 3, -5, 3],
    [3, 3, 3, -7, 3]
)));