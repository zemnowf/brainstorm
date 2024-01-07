<?php
/* Should return ᐃ type:
  0 : if ᐃ cannot be made with given sides
  1 : acute ᐃ
  2 : right ᐃ
  3 : obtuse ᐃ
*/
function triangleType(float $a, float $b, float $c): int {
    if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) return 0;

    $angles = [];
    $angles[] = rad2deg(acos((pow($a, 2) + pow($b, 2) - pow($c, 2))/(2*$a*$b)));

    $angles[] = rad2deg(acos((pow($a, 2) + pow($c, 2) - pow($b, 2))/(2*$a*$c)));

    $angles[] = rad2deg(acos((pow($c, 2) + pow($b, 2) - pow($a, 2))/(2*$c*$b)));


    foreach ($angles as $angle) {
        echo $angle . "<br>";
        if ($angle == 90) {
            return 2;
        } elseif ($angle > 90) {
            return 3;
        }
    }

    return 1;

}

echo triangleType(3,4,5);