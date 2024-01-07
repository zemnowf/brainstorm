<?php
function twoArePositive(int $a, int $b, int $c): bool
{
    $arr = array($a, $b, $c);
    $c = 0;
    foreach ($arr as $n) {
        if ($n > 0) $c++;
    }
    return $c == 2;
}

echo twoArePositive(1, -1, 1);