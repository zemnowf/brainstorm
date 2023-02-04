<?php
//В массив А(N), упорядоченный по возрастанию, вставить k элементов, не нарушая его
//последовательности

function insertIntoAscendingArray(array $ascArray, array $insertingArray): array
{
    for ($i = 0; $i < count($insertingArray); $i++) {
        $ascSize = count($ascArray);
        if ($ascArray[0] >= $insertingArray[$i]) {
            array_splice($ascArray, 0, 0, $insertingArray[$i]);
            continue;
        }

        for ($j = $ascSize - 1; $j >= 0; $j--) {
            if ($ascArray[$j] < $insertingArray[$i]) {
                array_splice($ascArray, $j + 1, 0, $insertingArray[$i]);
                break;
            }
        }
    }
    return $ascArray;
}

// 1, 3, 10, 13, 23 - inserting
// 5, 10, 15, 20    - ascending
//res - 1, 3, 5, 10, 10, 13, 20, 23

$K = array(1, 3, 2, 7, 23, 100, 3);
$A = array(5, 10, 15, 20);

printArray(insertIntoAscendingArray($A, $K));

function printArray($arr)
{
    foreach ($arr as $a) {
        echo $a . " ";
    }
}