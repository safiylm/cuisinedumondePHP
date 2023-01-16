<?php 

    try
    {
   //     $bdd = new PDO('mysql:host=sql301.byethost13.com;dbname=b13_31912303_recette;charset=utf8', 'b13_31912303', 'Safinaz2022');
   
        $bdd = new PDO('mysql:host=localhost;dbname=recette;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

?>



