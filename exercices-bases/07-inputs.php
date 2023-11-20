<?php

function stringLength(string $string) 
{
    $taille = strlen($string);
    if($taille > 9)
    {
        return true;
    }
    elseif($taille < 9)
    {
        return false;
    }
}

var_dump(stringLength("MotDePasseLong"));
echo "<br>";
var_dump(stringLength("azer"));

function passwordCheck(string $string)
{

}
