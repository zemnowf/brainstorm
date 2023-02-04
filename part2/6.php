<?php

//6. Получить упорядоченный по возрастанию массив С(К) путем слияния двух порядоченных по
//возрастанию массивов А(N) и В(М), где К=М+N.

function getAscendingArrayOutOfTwo(array $array1, array $array2): array
{
    for ($i = 0; $i < count($array2); $i++) {
        $array1Size = count($array1);
        if ($array1[0] >= $array2[$i]) {
            array_splice($array1, 0, 0, $array2[$i]);
            continue;
        }

        for ($j = $array1Size - 1; $j >= 0; $j--) {
            if ($array1[$j] < $array2[$i]) {
                array_splice($array1, $j + 1, 0, $array2[$i]);
                break;
            }
        }
    }
    return $array1;
}

print_r(getAscendingArrayOutOfTwo(array(1, 5, 7, 11, 15, 19, 27), array(3, 5, 11, 12, 13, 14, 15, 26, 29)));