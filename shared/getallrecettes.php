
<?php 

$json_object = file_get_contents("../data/recette.json");
$tab = json_decode($json_object, true);

if (file_exists('../data/recette-utilisateur.xml')) {
  $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
  exit('Failed to open test.xml.');
}

?>
