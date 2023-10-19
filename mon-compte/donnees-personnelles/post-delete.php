<?php
session_start();

if (file_exists('../../data/recette-utilisateur.xml')) {
  $xml = simplexml_load_file('../../data/recette-utilisateur.xml');
} else {
  exit('Failed to open test.xml.');
}

$path = "//utilisateur[email ='" . $_SESSION['utilisateur']['email'] . "' ]";

// on ajoute la recette dans le carnet de recette
if (count($xml->xpath($path)) == 1) {
  foreach ($xml->xpath($path) as $var) {
    unset($var[0]);
  }
}


$xml->asXML();
$xml->asXML('../../data/recette-utilisateur.xml');
header('Location: ../../deconnexion/index.php');
exit();


?>