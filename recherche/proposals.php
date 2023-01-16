<?php 
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=recette;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }


$xml = new SimpleXMLElement('<element></element>');

$start = htmlspecialchars($_GET['start']);

$reponse = $bdd->query('SELECT *  FROM recette WHERE nomRecette LIKE "'.$start.'%"');

while ($donnees = $reponse->fetch())
{
 $xml->addChild('nomRecette', $donnees['nomRecette']); // Production du ré sultat

}
$reponse->closeCursor();

header('Content-type: text/xml; charset=utf-8');

print($xml->asXML()) ;

?>


