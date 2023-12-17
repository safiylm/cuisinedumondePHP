<?php
session_start();


$path='../data/recette.json';
$json_object = file_get_contents($path);
$tab = json_decode($json_object, true);

$i = intval($_GET['idRecette']);
unset( $tab["sitecuisine"]["liste_recette"]['recette'][$i] );

$jsonString = json_encode($tab , JSON_PRETTY_PRINT);
// Write in the file
$fp = fopen($path,  'w');
fwrite($fp, $jsonString);
fclose($fp);
header('Location: ../../index.php');
exit();

?>