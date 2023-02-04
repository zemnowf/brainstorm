<?php
//1. В массиве А(N,N) найти суммы элементов, расположенных на главной диагонали, ниже
//диагонали и выше диагонали.

function getSum(array $arr){
    $N = count($arr);
    $sumOnDiagonal = 0;
    $sumAbove = 0;
    $sumUnder = 0;

    for ($i = 0; $i < $N; $i++){
        for($j = 0; $j < $N; $j++){
            if ($i < $j){
                $sumAbove += $arr[$i][$j];
            } elseif ($i > $j){
                $sumUnder += $arr[$i][$j];
            } elseif ($i == $j){
                $sumOnDiagonal += $arr[$i][$j];
            }
        }
    }
    echo "Diagonal: $sumOnDiagonal; Above: $sumAbove; Under: $sumUnder";
}

getSum(array(array(1, 2, 2), array(3, 1, 2), array(3, 3, 1))); // 3 6 9