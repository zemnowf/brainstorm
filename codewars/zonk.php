<?php

// straight (1, 2, 3, 4, 5 and 6) | 6 3 1 2 5 4 | 1000 points

// three of 1                     | 1 4 1 1 x x | 1000 points

// three pairs of any dice        | 2 2 4 4 1 1 | 750 points

// three of 2                     | 2 3 4 2 2 x | 200 points

// three of 3                     | 3 4 3 6 3 2 | 300 points

// three of 4                     | 4 4 4 x x x | 400 points

// three of 5                     | 2 5 5 5 4 x | 500 points

// three of 6                     | 6 6 2 6 x x | 600 points

// Four of a kind                 | 1 1 1 1 4 6 | 2x three-of-kind

// Five of a kind                 | 5 5 5 5 4 5 | 3x three-of-kind

// Six of a kind                  | 4 4 4 4 4 4 | 4x three-of-kind

// every 1                        | 4 3 1 2 2 5 | 100 points

// every 5                        | 5 2 6 2 6 1 | 50 points

function getScore(array $dice) : int
{
    $comp = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0];
    $result = 0;
    $straight = 0;
    sort($dice);

    for ($i = 0; $i < sizeof($dice); $i++) {
        $comp[$dice[$i]]++;
        if (isset($dice[$i + 1]) && $dice[$i] == $dice[$i + 1] - 1) {
            $straight++;
        }
    }

    if ($straight == 5) $result = 1000;

    $couples = 0;
    foreach ($comp as $c) {
        if ($c == 2) $couples++;
    }


    if ($couples == 3 && $result < 750) $result = 750;

    $tripples = 0;
    foreach ($comp as $c) {
        if ($c == 3) $tripples++;
    }

    if ($tripples == 2) {

        $triplesResult = 0;
        foreach ($comp as $key => $c) {
            if ($c == 3 ) {
                if ($key == 1) {
                    $triplesResult += $key * 1000;
                } else $triplesResult += $key * 100;
            }
        }
        echo "yes" . $triplesResult . "yes";
        if ($result < $triplesResult) $result = $triplesResult;
    }

    $timesOfNumResult = 0;
    foreach ($comp as $key => $value) {
        if ($value >= 3) {
            if ($key == 2 || $key == 3 || $key == 4 || $key == 6) {
                $timesOfNumResult = $key * 100 * ($value - 2);
                $timesOfNumResult += $comp[5]*50;
                $timesOfNumResult += $comp[1]*100;
            } elseif ($key == 5) {
                $timesOfNumResult = $key * 100 * ($value - 2);
                $timesOfNumResult += $comp[1]*100;
            } else  {
                $timesOfNumResult = $key * 100 * ($value - 2) * 10;
                $timesOfNumResult += $comp[5]*50;
            }
        }
        if ($result < $timesOfNumResult) $result = $timesOfNumResult;
    }



    if ($comp[1] < 3 && $comp[5] < 3 && $result < ($comp[1]*100 + $comp[5]*50)) $result = ($comp[1]*100 + $comp[5]*50);

    return $result;
}

echo getScore([1, 1, 6, 6 , 6, 1]);