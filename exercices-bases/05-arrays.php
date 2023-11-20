<?php
$names = ['Joe', 'Jack', 'Léa', 'Zoé', 'Néo'];

function firstItem(array $array)
{
    if (empty($array)) 
    {
        return null;
    }

    return $array[0];
}

function lastItem(array $array)
{
    if (empty($array)) 
    {
        return null;
    }

    return $array[count($array) - 1];
}


function sortItems($array)
{
    if (empty($array)) 
    {
        return [];
    }

    rsort($array);

    return implode(', ', $array);
}


function stringItems($array)
{
    if (empty($array)) 
    {
        return "Nothing to display";
    }

    sort($array);

    return implode(', ', $array);
}

   
echo firstItem($names);
echo "<br>"; 
echo lastItem($names); 
echo "<br>";
echo sortItems($names);
echo "<br>";
echo stringItems($names);

