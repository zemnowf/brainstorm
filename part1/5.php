<?php

function checkSymmetricNumber($number)
{
    $counter = 0;
    $currentNumber = $number;
    while ($currentNumber > 0) {
        $counter++;
        $currentNumber = (int)($currentNumber / 10);
    }

    if ($counter % 2 == 0) {
        $currentNumber = $number;
        $rightPart = 0;
        for ($i = 0; $i < $counter / 2; $i++) {
            $digit = $currentNumber % 10;
            $rightPart = ($rightPart * 10) + $digit;
            $currentNumber = (int)($currentNumber / 10);
        }
        $leftPart = 0;
        for ($i = $counter / 2; $i < $counter; $i++) {
            $digit = $currentNumber % 10;
            $leftPart = ($leftPart * 10) + $digit;
            $currentNumber = (int)($currentNumber / 10);
        }

        if ($leftPart == $rightPart) {
            return true;
        }
    }
    return false;
}

var_dump(checkSymmetricNumber(951951));
var_dump(checkSymmetricNumber(55432));
var_dump(checkSymmetricNumber(111222));