<?php
//3. В массиве А(N,М) найти максимальный и минимальный элементы среди всех элементов тех
//строк, которые упорядочены по возрастанию или по убыванию.

function findMinMaxInSequenceRows(array $arr)
{

    $N = count($arr);
    for ($i = 0; $i < $N; $i++) {
        $M = count($arr[$i]);

        $ascending = null;
        $elem = $arr[$i][0];
        for ($j = 1; $j < $M; $j++) {
            $next = $arr[$i][$j];
            if ($next >= $elem) {
                $ascending = true;
            } else {
                $ascending = false;
                break;
            }
            $elem = $next;
        }

        $descending = null;
        $elem = $arr[$i][0];
        for ($j = 1; $j < $M; $j++) {
            $next = $arr[$i][$j];
            if ($next <= $elem) {
                $descending = true;
            } else {
                $descending = false;
                break;
            }
            $elem = $next;
        }

        if ($descending || $ascending) {
            $min = $arr[$i][0];
            $max = $arr[$i][0];
            $minKey = 0;
            $maxKey = 0;
            for ($j = 1; $j < $M; $j++){
                $elem = $arr[$i][$j];
                if ($min >= $elem){
                    $min = $elem;
                    $minKey = $j;
                }
                if ($max <= $elem){
                    $max = $elem;
                    $maxKey = $j;
                }
            }
            echo "в ряду " . ($i + 1) . " минимальный элемент с индексом " . ($minKey + 1)
                . ": " . $min . "; максимальный элемент с индексом " . ($maxKey + 1) . ": " . $max . "<br>";
        } else echo "ряд " . ($i + 1) . " - неупорядочен <br>";
    }

}

findMinMaxInSequenceRows(array(
    [1, 3, 5, 9], //1 9
    [5, 4, 3, 2], //2 5
    [1, 3, 2, 1], // -
    [9, 5, 4, 3])); // 3 9