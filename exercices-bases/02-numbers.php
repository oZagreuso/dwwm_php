<?php
function getSum(int $a, int $b) 
{
    return $a + $b;
}

function getSub(int $a, int $b)
{
    return $a - $b;
}

function getMulti(float $a, float $b) : 
{
    return $a * $b;
}

echo getSum(5, 3);
echo getSub(5, 3);
echo getSub(3, 5);