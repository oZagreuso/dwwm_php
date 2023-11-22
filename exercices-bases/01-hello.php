<?php
function helloWorld() : void 
{
    echo "Hello World!";
}


    function hello(string $name) : string
    {
     if (empty($name)) {
      return "Nobody";
     } 
     else {
      return "Hello $name";
     }
    }
    


helloWorld();
echo "<br>";
echo hello("Mike");
echo "<br>";
echo hello("");