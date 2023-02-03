<?php
//1. В массиве А(N) найти: а) число элементов, предшествующих первому отрицательному
//элементу; б) сумму нечетных элементов массива, следующих за последним отрицательным
//элементом.

function countElementsBeforeFirstNegative(array $arr)
{
    for ($i = 0, $counter = 0; $i < count($arr); $i++) {
        if ($arr[$i] >= 0) {
            $counter++;
        } else break;
    }
    return $counter;
}

function countSumOfOddElementsAfterLastNegative(array $arr)
{
    $sum = 0;
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        if ($arr[$i] % 2 != 0) {
            $sum = $sum + $arr[$i];
            if ($arr[$i] < 0) {
                $sum -= $arr[$i];
                return $sum;
            }
        }
    }
    return $sum;
}

function solveArray(array $arr)
{
    echo "Число элементов перед 1-ым отрицательным: "
        . countElementsBeforeFirstNegative($arr) . "<br>";
    echo "Сумма нечетных элементов после последнего отрицательного: "
        . countSumOfOddElementsAfterLastNegative($arr) . "<br>";


}

solveArray(array(1, 2, -1, 4, 5));
solveArray(array(1, 2, -1, 5, -1));
solveArray(array(-1, 2, 3, 4, 5));
