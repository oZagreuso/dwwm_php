<?php

function getToday() 
{
    $timestamp = time();
    $today = date("d/m/Y", $timestamp);   
    return $today;
}


function getTimeLeft($date)
{
   
    if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $date)) 
    {
        return "Date invalide";
    }
    
    $timestamp = strtotime($date);    
    $now = time();
    $diff = $timestamp - $now;
  
    $years = floor($diff / (60 * 60 * 24 * 365));
    $months = floor($diff / (60 * 60 * 24 * 30)) % 12;
    $days = floor($diff / (60 * 60 * 24)) % 30;

    if($diff < 0) 
    {
        return "Evènement passé";
    }

    elseif($now == $timestamp)
    {
        return "aujourd'hui";
    }

    else
    {
        return sprintf("%d ans, %d mois, %d jours", $years, $months, $days);
    }
  
    
}
  

echo getToday();
echo "<br>";
echo getTimeLeft("2019-09-29");
echo "<br>";
echo getTimeLeft ("2020-01-30");
echo "<br>";
echo getTimeLeft ("2020-02-15"); 
echo "<br>";
echo getTimeLeft("2020-05-16");
echo "<br>";
echo getTimeLeft("2020-05-");
echo "<br>";
echo getTimeLeft("2024-12-25");
echo "<br>";
echo getTimeLeft("2023-11-21");
