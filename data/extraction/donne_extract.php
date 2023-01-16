<?php
    $Recettes=array();
    include 'Donnees.inc.php';
    

    echo '</br> titre </br>';
    echo $Recettes[0]['titre'];
    
    echo '</br></br> ingredients </br>';
    echo $Recettes[0]['ingredients'];
    
    echo '</br></br> preparation </br>';
    echo $Recettes[0]['preparation'];
    
    echo '</br></br> index </br>';
    //print_r($Recettes[0]['index']);
    foreach ($Recettes[0]['index'] as $ing){
        echo $ing. "</br>" ; 
    }
    
    foreach ($Recettes as $t){
        echo '</br> titre </br>';
        echo $t['titre'];
        
        echo '</br></br> ingredients </br>';
        echo $t['ingredients'];
        
        echo '</br></br> preparation </br>';
        echo $t['preparation'];
        
        echo '</br></br> index </br>';
        //print_r($Recettes[0]['index']);
        foreach ($t['index'] as $ing){
            echo $ing. "</br>" ; 
        }
    }

    ?>