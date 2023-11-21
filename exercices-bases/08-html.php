<?php

$names =  ['Joe', 'Jack', 'Léa', 'Zoé', 'Néo' ];


function htmlList(string $listName, array $listItems)
{ 
        
        if (empty($listItems)) {
          return "Aucun résultat";
        }      
      
        sort($listItems);

     

        $list = "<ul>";
        
        foreach ($listItems as $item) {
         
            $list .= "<li>{$item}</li>";           
            
        }      

         $list .= "</ul>";
        $title = "<h3>{$listName}</h3>";

        return $title . $list;
      
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        
<?= htmlList("Liste des personnes", $names) ?>

 
    
</body>
</html>

