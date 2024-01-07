<div>
    <pre>debug</pre>
</div>

<?php

function solution($number): int
{

    $counter = 0;
    for ($i = $number - 1; $i > 0; $i--) {
        if ($i % 5 == 0 || $i % 3 == 0) {
            $counter+=$i;
            echo $i;
        }
    }

    return $counter;
}

echo solution(10);