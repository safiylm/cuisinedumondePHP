<?php
session_start();

$path='../data/recette.json';
$json_object = file_get_contents($path);
$tab = json_decode($json_object, true);

print_r($_POST); echo "</br></br></br>";

$newrecette=array();
$idd = count($tab["sitecuisine"]["liste_recette"]['recette']);
$idd = $tab["sitecuisine"]["liste_recette"]['recette'][$idd -1 ]['id'] +1 ;
$newrecette['id']= $idd;

$newrecette['titre']= $_POST['nom-recette'];
$newrecette['auteur']= $_SESSION['utilisateur']['id'];
$newrecette['image']= $_POST['url-image'];
$newrecette['categorie']= $_POST['categorie'];
$newrecette['cout']= $_POST['cout'];

//image 
$newrecette['liste_ingredients']= array();
$newrecette['liste_ingredients']["nb_personne"] = $_POST['nb-personne'];
$newrecette['liste_ingredients']["ingredient"] = array();
$newrecette['liste_ingredients']["ingredient"][0] = $_POST['un-ingredient-nb-0'];


for( $i =1; $i<$_POST['nb-ingredients-total']; $i++){
    $newrecette['liste_ingredients']["ingredient"][$i] = $_POST['un-ingredient-nb-'.$i];
}

$newrecette['difficulte']=$_POST['difficulte'];
$newrecette['temps_total']=$_POST['tmp-total'];


$newrecette['preparation']['etape']=array();
$newrecette['preparation']['etape'][0]=$_POST['une-etape-nb-0'];

for( $i =1; $i<$_POST['nb-etapes-total']; $i++){
    $newrecette['preparation']["etape"][$i] = $_POST['une-etape-nb-'.$i];

}

print_r($newrecette);


array_push($tab["sitecuisine"]['liste_recette']['recette'], $newrecette);


$jsonString = json_encode($tab , JSON_PRETTY_PRINT);
// Write in the file
$fp = fopen($path, 'w');
fwrite($fp, $jsonString);
fclose($fp);


header('Location: ../recette/index.php?idRecette='.$idd.'');
exit();