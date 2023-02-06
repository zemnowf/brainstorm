<?php
//7. В массиве А(N,N) поменять местами максимальные элементы нижнего и верхнего
//треугольников относительно главной диагонали.

function replaceMinMaxUnderAboveMainDiagonal(array $arr): array
{
    $N = count($arr);

    $maxAbove = $arr[0][1];
    $maxAboveI = 0;
    $maxAboveJ = 1;

    $minAbove = $arr[0][1];
    $minAboveI = 0;
    $minAboveJ = 1;

    $maxUnder = $arr[1][0];
    $maxUnderI = 1;
    $maxUnderJ = 0;

    $minUnder = $arr[1][0];
    $minUnderI = 1;
    $minUnderJ = 0;

    for ($i = 0; $i < $N; $i++) {
        for ($j = 1; $j < $N; $j++) {
            if ($i < $j) {
                for ($x = 0; $x < $N; $x++) {
                    for ($y = 0; $y < $N; $y++) {
                        if ($x < $y) {
                            if ($maxAbove <= $arr[$x][$y]) {
                                $maxAbove = $arr[$x][$y];
                                $maxAboveI = $x;
                                $maxAboveJ = $y;
                            }
                            if ($minAbove >= $arr[$x][$y]) {
                                $minAbove = $arr[$x][$y];
                                $minAboveI = $x;
                                $minAboveJ = $y;
                            }
                        }

                    }
                }
            } elseif ($i > $j) {
                for ($x = 0; $x < $N; $x++) {
                    for ($y = 0; $y < $N; $y++) {
                        if ($x > $y) {
                            if ($maxUnder <= $arr[$x][$y]) {
                                $maxUnder = $arr[$x][$y];
                                $maxUnderI = $x;
                                $maxUnderJ = $y;
                            }
                            if ($minUnder >= $arr[$x][$y]) {
                                $minUnder = $arr[$x][$y];
                                $minUnderI = $x;
                                $minUnderJ = $y;
                            }
                        }
                    }
                }
            } else continue;
        }
    }
    echo "maxAbove: $maxAbove [$maxAboveI][$maxAboveJ], 
maxUnder: $maxUnder [$maxUnderI][$maxUnderJ],
minAbove: $minAbove [$minAboveI][$minAboveJ],
minUnder: $minUnder [$minUnderI][$minUnderJ]";
    $arr[$maxAboveI][$maxAboveJ] = $maxUnder;
    $arr[$maxUnderI][$maxUnderJ] = $maxAbove;
    $arr[$minAboveI][$minAboveJ] = $minUnder;
    $arr[$minUnderI][$minUnderJ] = $minAbove;

    return $arr;
}

echo "<pre>";
print_r(replaceMinMaxUnderAboveMainDiagonal(array(
    [21, 40, 45, 50], // 21 (10) 45 50
    [11, 22, 55, 59], // 11 22 55 (15)
    [10, 12, 23, 43], // (40) 12 23 43
    [15, 13, 14, 24] //  (59) 13 14 24
)));