<?php
function getSum(int $a, int $b) 
{
    return $a + $b;
}

function getSub(int $a, int $b)
{
    return $a - $b;
}

function getMulti(float $a, float $b): float
{
    $result = $a * $b;
    $precision = 2;
    return round($result, $precision);
}

function getDiv(int $a, int $b) 
{
    if ($b == 0) {
        return 0;
    } else {
        $result = $a / $b;
        return round($result, 2);
    }
}

echo getSum(5, 3);
echo "<br>";
echo getSub(5, 3);
echo "<br>";
echo getSub(3, 5);
echo "<br>";
echo getMulti(5.6, 3);
echo "<br>";
echo getMulti(5.6, -3.7);
echo "<br>";
echo getDiv(20, 3);  
echo "<br>";
echo getDiv(20, 0); 