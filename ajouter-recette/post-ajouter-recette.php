<?php
session_start();

$path='../data/recette.json';
$json_object = file_get_contents($path);
$tab = json_decode($json_object, true);

print_r($_POST);

echo "</br></br></br>";

$newrecette=array();

$newrecette['titre']=$_POST['nom-recette'];
$newrecette['auteur']=$_SESSION['utilisateur']['email'];
$newrecette['categorie']=$_POST['categorie'];
$newrecette['image'];

//image 
$newrecette['liste_ingredients']= array();
$newrecette['liste_ingredients']["nb_personne"] = $_POST['nb-personne'];
$newrecette['liste_ingredients']["ingredient"] = array();
$newrecette['liste_ingredients']["ingredient"][0] = $_POST['quantite']." ".$_POST['mesure']." ".$_POST['ingredient'];

for( $i =1; $i<$_POST['nb-ingredients-total']; $i++){
    $newrecette['liste_ingredients']["ingredient"][$i] = $_POST['quantite'.$i]." ".$_POST['mesure'.$i]." ".$_POST['ingredient'.$i];

}

$newrecette['difficulte']=$_POST['difficulte'];
$newrecette['temps_preparation']=$_POST['tmp-prep'];
$newrecette['temps_cuisson']=$_POST['tmp-cuisson'];
$newrecette['temps_repos']=$_POST['tmp-attente'];

$newrecette['preparation']['etape']=array();
$newrecette['preparation']['etape'][0]=$_POST['etape0'];

for( $i =1; $i<$_POST['nb-etapes-total']; $i++){
    $newrecette['preparation']["etape"][$i] = $_POST['etape'.$i];

}

print_r($newrecette);


array_push($tab["sitecuisine"]['liste_recette']['recette'], $newrecette);







 $jsonString = json_encode($tab , JSON_PRETTY_PRINT);
 // Write in the file
 $fp = fopen($path, 'w');
 fwrite($fp, $jsonString);
 fclose($fp);

 header('Location: ../index.php');
 exit();