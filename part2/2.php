<?php
//2. Дан массив А(N). Получить массив В(N), i-элемент которого равен среднему арифметическому
//первых i элементов массива А.

function getNewArray(array $arrayA)
{
    $arrayB = array();
    for ($i = 0; $i < count($arrayA); $i++) {
        $sum = 0;
        for ($j = 0; $j <= $i; $j++) {
            $sum += $arrayA[$j];
        }
        $arrayB[] = $sum / ($i + 1);
    }
    return $arrayB;
}

print_r(getNewArray(array(2, 4, 9, 45))); //2, 3, 5, 15