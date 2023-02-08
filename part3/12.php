<?php
//3.12. В массиве А(N,М) удалить столбцы, все элементы которых являются простыми числами.

function removeColumnsWithPrimeNumbers(array $array): array
{
    $N = count($array);
    $M = count($array[0]);
    $newArr = [];
    for ($j = 0; $j < $M; $j++) {
        $ifNonePrime = false;
        for ($i = 0; $i < $N; $i++) {
            for ($divider = 2; $divider <= sqrt($array[$i][$j]); $divider++) {
                if ($array[$i][$j] % $divider == 0) {
                    $ifNonePrime = true;
                    break;
                }
            }
            if ($ifNonePrime) {
                break;
            }
        }
        if ($ifNonePrime) {
            $newVector = [];

            for ($i = 0; $i < $N; $i++) {
                $newVector[] = $array[$i][$j];
            }
            $newArr[] = $newVector;
        }
    }

    $transposedArray = [];
    for ($i = 0; $i < count($newArr[0]); $i++) {
        for ($j = 0; $j < count($newArr); $j++) {
            $transposedArray[$i][$j] = $newArr[$j][$i];
        }
    }

    return $transposedArray;
}

echo "<pre>";
print_r(removeColumnsWithPrimeNumbers(array(
    [13, 14, 13, 18],
    [17, 53, 11, 14],
    [29, 52, 23, 25]
)));