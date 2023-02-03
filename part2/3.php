<?php
//3. В массиве А(N) подсчитать количество различных элементов

function countDifferentElements(array $arr): int
{
    $fillerArray = [];

    for ($i = 0; $i < count($arr); $i++) {
        $isElementDifferent = true;
        for ($j = 0; $j < count($fillerArray); $j++) {
            if ($arr[$i] == $fillerArray[$j]) {
                $isElementDifferent = false;
            }
        }
        if ($isElementDifferent) {
            $fillerArray[] = $arr[$i];
        }
    }

    return count($fillerArray);
}

print_r(countDifferentElements(array(1, 2, 3, 4, 3, 5, 5, 9, 3, 2))); //6