<?php
//5. В массиве А(N) каждый элемент равен 0, 1 или 2. Переставить элементы массива так, чтобы
//сначала расположились все нули, затем все двойки и, наконец, все единицы.

function replaceElementsInArray(array $arr): array
{
    $arrayWithZeroes = [];
    $arrayWithTwos = [];
    $arrayWithOnes = [];

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === 0) {
            $arrayWithZeroes[] = $arr[$i];
        } elseif ($arr[$i] == 1) {
            $arrayWithOnes[] = $arr[$i];
        } elseif ($arr[$i] == 2) {
            $arrayWithTwos[] = $arr[$i];
        }
    }

    $newArr = [];

    for ($i = 0; $i < count($arrayWithZeroes); $i++) {
        $newArr[] = $arrayWithZeroes[$i];
    }

    for ($i = 0; $i < count($arrayWithTwos); $i++) {
        $newArr[] = $arrayWithTwos[$i];
    }

    for ($i = 0; $i < count($arrayWithOnes); $i++) {
        $newArr[] = $arrayWithOnes[$i];
    }

    return $newArr;
}

print_r(replaceElementsInArray(array(0, 1, 2, 0, 1, 2, 2, 1, 0)));

